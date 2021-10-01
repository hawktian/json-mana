import json
import pprint
import sys
import urllib.request

url = str(sys.argv[1])
with urllib.request.urlopen(url) as response:
    j = json.loads(response.read().decode())
    pprint.pprint(j, compact=True)


