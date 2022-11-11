## SecureMyID
=====================

This package automatically assist with packing and sending API to SecureMyID for;
1. ID Verification Request
2. Reporting Identity 
3. Decrypting Webhook to get both Identity Details and Account Suspension details



`use TrillzGlobal\SecureMyID\SecureMyID;`

Initiate new Class with API Key and Secret Key generated on your dashboard on SecureMyID

`$verify =  new SecureMyID($api_key, $secret_key);`

Sending Request to Verify ID. Response will either be successful or failed. Identity of customer will be sent as response to webhook provided on secureMyID dashboard.
# Sample Payload
`$payload = '{"phone_number":"090000000001"}';`
`$result = $verify->verifyID($data);`

Reporting a suspected Fraudulent User comes handy with this endpoint as you can use this to protect against same user from future fraud.
# Sample Payload
`$payload = '{"phone_number":"090000000001", "risk_level":3, "details":"Hacked into our system"}';`

`$result =  $verify->reportIdentity($data);`


Registered webhook receives identity verification response and also Panic Notification if user want to suspend action on their account for some times.

`$result =  $verify->decryptWebhook($data);`

