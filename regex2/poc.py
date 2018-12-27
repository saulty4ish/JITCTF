import requests
from io import BytesIO

data = {
  'greeting': BytesIO(b'Merry Christmas' + b'a' * 1000000)
}

res = requests.post('http://106.75.66.87:8888/',data=data)
print(res.text)