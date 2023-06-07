import datetime
import random
import mysql.connector
import requests

# Connect to the MySQL database
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="road safety monitoring system"
)

# Check weather conditions and generate updates
def generate_weather_updates():
    
    # API endpoint for weather data
    api_url = "https://api.weatherapi.com/v1/current.json"
    
    # API key for accessing the weather data
    api_key = "4259a1926e83487ab21133210230706"
    
    # List of locations for which to generate weather updates
    locations = ['Kathmandu', 'Lalitpur', 'Bhaktapur']
    
    for location in locations:
        # Parameters for the API request
        params = {
            'key': api_key,
            'q': location
        }
        
        try:
            # Send the API request
            response = requests.get(api_url, params=params)
            
            # Check if the request was successful (status code 200)
            if response.status_code == 200:
                # Extract the weather data from the response
                weather_data = response.json()
                
                # Get the relevant weather information
                condition = weather_data['current']['condition']['text']
                temperature = weather_data['current']['temp_c']
                
                # Create an update record
                update = {
                    'User': 'Server',
                    'Timestamp': datetime.datetime.now(),
                    'Location': location,
                    'Description': f"Weather condition: {condition}, Temperature: {temperature}°C",
                    'Source': 'Server',
                    'Picture': None  # Optional: Set the picture field if applicable
                }
                
                # Insert the update into the database
                insert_update(update)
                
            else:
                print(f"Error retrieving weather data for {location}. Status code: {response.status_code}")
        
        except requests.exceptions.RequestException as e:
            print(f"Error retrieving weather data for {location}: {e}")

# Insert the generated update into the database
def insert_update(update):
    cursor = db.cursor()

    # Prepare the SQL statement
    sql = "INSERT INTO RoadConditionUpdates (User, Timestamp, Location, Description, Source, Picture) " \
          "VALUES (%s, %s, %s, %s, %s, %s)"

    # Execute the SQL statement with the update data
    cursor.execute(sql, (
        update['User'],
        update['Timestamp'],
        update['Location'],
        update['Description'],
        update['Source'],
        update['Picture']
    ))

    # Commit the changes to the database
    db.commit()

# Call the function to generate server-generated updates
generate_weather_updates()

# Close the database connection
db.close()
