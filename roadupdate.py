import datetime
import random
import mysql.connector

# Connect to the MySQL database
db = mysql.connector.connect(
    host="localhost",
    user="your_username",
    password="your_password",
    database="your_database"
)

# Check weather conditions and generate updates
def generate_weather_updates():
    # Retrieve weather data from an API or other sources
    # For this example, we generate random weather conditions
    weather_conditions = ['Rainy', 'Sunny', 'Cloudy']

    # Generate updates for specific locations
    locations = ['City A', 'City B', 'City C']

    for location in locations:
        # Generate a random weather condition
        condition = random.choice(weather_conditions)

        # Create an update record
        update = {
            'User': 'Server',
            'Timestamp': datetime.datetime.now(),
            'Location': location,
            'Description': f"Weather condition: {condition}",
            'Source': 'Server',
            'Picture': None  # Optional: Set the picture field if applicable
        }

        # Insert the update into the database
        insert_update(update)

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
