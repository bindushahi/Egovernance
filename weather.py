import datetime as dt
import requests 

BASE_URL="https://api.openweathermap.org/data/2.5/weather?"
API_KEY="1198126d3c1b28854ae8424581f1b6dd"
CITY="Kathmandu"

def kelvin_to_celsius_farenheit(kelvin):
    celsius= kelvin-273.15
    farenheit = celsius * (9/5)+32
    return celsius,farenheit

url= BASE_URL+ "appid=" + API_KEY + "&q=" +CITY

response=requests.get(url).json()
print(response)

temp_kelvin= response['main']['temp']
temp_celsius, temp_farenheit = kelvin_to_celsius_farenheit(temp_kelvin)
feels_like_kelvin = response['main']['feels_like']
feels_like_celsius, feels_like_farenheit = kelvin_to_celsius_farenheit(feels_like_kelvin)
wind_speed= response['wind']['spped']
humidity = response['main']['huminity']
description = response['weather'][0]['description']
sunrise_time=dt.datetime.utcfromtimestamp(response['sys']['sunrise']+response['timezone'])
sunset_time=dt.datetime.utcfromtimestamp(response['sys']['sunset']+response['timezone'])


