## 📄 Envato Elements File Downloader API

### 📌 Overview
This PHP script runs on a VPS and serves as an API for downloading files from Envato Elements along with their license files.  
Using a valid Envato account cookie, it processes user requests, downloads the requested item with its license, and returns the download links in JSON format.

---

### ⚙️ How It Works
1. Receive user request  
   - The user sends an Envato Elements link and a valid API Key.  
   - If the link is invalid or the API Key is wrong, an error response is returned.

2. Create required folders (if missing)  
   - Automatically creates the following folders if they don’t exist:  
     - files  
     - cookies  
     - element_license

3. Connect to Envato & fetch data  
   - Uses cURL with the provided account cookie to get the CSRF token and the JSON item data.

4. Retrieve license file  
   - Saves the license file as a .txt file and generates its download link.

5. Download the original file  
   - Downloads the item with its real name and extension.  
   - Returns both the file and license links in the JSON response.

---

### 📤 Example API Response
{
    "status": true,
    "download": "http://your-vps.com/files/envato/ElementEnvato_12345.zip",
    "license": "http://your-vps.com/element_license/12345.txt"
}

---

### 📋 Requirements
- PHP 7.4+ with cURL enabled
- VPS or dedicated server
- Valid Envato Elements account cookie
- Writable folders:
  - files
  - cookies
  - element_license

---

### 📎 Telegram Group
Join our Telegram group for support and updates:  
[https://t.me/Envato4U](https://t.me/Envato4U)
