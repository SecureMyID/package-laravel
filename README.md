
## :dart: SecureMyID ## 
=====================

<p align="center">
  <a href="https://github.com/SecureMyID/package-laravel/fork" target="_blank">
    <img src="https://img.shields.io/github/forks/maurodesouza/profile-readme-generator?" alt="Badge showing the total of project forks"/>
  </a>

  <a href="https://github.com/SecureMyID/package-laravel/stargazers" target="_blank">
    <img src="https://img.shields.io/github/stars/maurodesouza/profile-readme-generator?" alt="Badge showing the total of project stars"/>
  </a>

  <a href="https://github.com/SecureMyID/package-laravel/commits/main" target="_blank">
    <img src="https://img.shields.io/github/commit-activity/m/maurodesouza/profile-readme-generator?" alt="Badge showing average commit frequency per month"/>
  </a>

  <a href="https://github.com/SecureMyID/package-laravelcommits/main" target="_blank">
    <img src="https://img.shields.io/github/last-commit/maurodesouza/profile-readme-generator?" alt="Badge showing when the last commit was made"/>
  </a>

  <a href="https://github.com/SecureMyID/package-laravel/issues" target="_blank">
    <img src="https://img.shields.io/github/issues/maurodesouza/profile-readme-generator?" alt="Badge showing the total of project issues"/>
  </a>

  <a href="https://github.com/maurodesouza/profile-readme-generator/pulls" target="_blank">
    <img src="https://img.shields.io/github/issues-pr/maurodesouza/profile-readme-generator?" alt="Badge showing the total of project pull-requests"/>
  </a>

  <a href="https://github.com/SecureMyID/package-laravel/LICENSE" target="_blank">
    <img alt="Badge showing project license type" src="https://img.shields.io/github/license/maurodesouza/profile-readme-generator?color=f85149">
  </a>
</p>


## :checkered_flag: Staring ##

This package automatically assist with packing and sending API to SecureMyID for;
1. ID Verification Request
2. Reporting Identity 
3. Decrypting Webhook to get both Identity Details and Account Suspension details



## :rocket: Usage ##

```bash
use TrillzGlobal\SecureMyID\SecureMyID;

# Initiate new Class with API Key and Secret Key generated on your dashboard on SecureMyID

$verify =  new SecureMyID($api_key, $secret_key);

# Sending Request to Verify ID. Response will either be successful or failed. Identity of customer will be sent as response to webhook provided on secureMyID dashboard.
# Sample Payload

$payload = '{"phone_number":"090000000001"}';
$result = $verify->verifyID($data);

# Reporting a suspected Fraudulent User comes handy with this endpoint as you can use this to protect against same user from future fraud.

# Sample Payload
$payload = '{"phone_number":"090000000001", "risk_level":3, "details":"Hacked into our system"}';
$result =  $verify->reportIdentity($data);


#Registered webhook receives identity verification response and also Panic Notification if user want to suspend action on their account for some times.

$result =  $verify->decryptWebhook($data);
```


## :memo: License ##

This project is under license from MIT. For more details, see the [LICENSE](LICENSE) file.


Made with :heart: by <a href="https://github.com/trillzglobal" target="_blank">Michael Ojo</a>
