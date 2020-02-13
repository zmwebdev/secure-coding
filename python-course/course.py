print("Kaixo Mundua!!")

"Kaixo {} {}".format("Mundua","!!")

s="kaixo!" + " Mundua"
print(s)

# lists
bikes = ['trek', 'redline', 'giant']

print(bikes[-1])

for x in bikes:
    print(x)

for x in range(1,10):
    print(x)

def batuketa(x=0,y=0):
    return x,y,x+y
    

x,y,z=batuketa(0,1,2)
x=batuketa(0,1,2)


class Txakurra():
    def __init__(self, izena='IzenGabekoTxakurra'):
        self.izena = izena
    
    def zaunka(self):
        print(self.izena + " zaukaka ari da")

bixkor = Txakurra('bixkor')
bixkor.zaunka()

bixkor = Txakurra()
bixkor.izena = 'Bixkor'
bixkor.zaunka()

class HezitakoTxakurra(txakurra):
    def __init__(self, izena):
        super().__init__(izena)
    
    def eseri(self):
        self.zaunka()
        print("Eserita nago")


zuri = HezitakoTxakurra('zuri')
zuri.eseri()

#
try:
    x = "Kaixo"
    int(x)
except ValueError as e:
    print(e)
else:
    print(str(x))