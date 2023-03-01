# WebSecurityProject
This project aims to demonstrate the differences in various input validation mechanisms to prevent SQL injection and Cross Site Scripting (XSS).
<br>
<ol>
<li><b><u>Vanilla</u></b>: this website is not secure. It does not validate any input and is thus vulnerable to SQL injection. A simple attack can be demonstrated using an inverted comma.</li>
<li><b><u>Blacklist</u></b>: this mechanism follows the principle of "reject known bad". A regular expression is used to reject or ignore statements that have characters or words in the input that match the banned characters list. This is not practical for all cases, for examples, passwords, where special charaters are recommended for strong passwords. Apart from that, this does not prevent zero-day input vulnerabilities that may use inputs that are not in the restricted list.</li>
<li><b><u>Whitelist</u></b>: "accept known good." Only certain types of inputs are allowed, rest are rejected. Again, this is not a practical approach due to reasons listed above, but it does prevent any previously undiscovered vulnerablities form being exploited.</li>
<li><b><u>Escape Sequence and Prepared Statements</b>: Problems with SQL injection occurs when user input is treated as a part of the code and not as raw data. Escape sequences and Prepared Statements ensure that user input is only read as data. This is achieved using escape characters and pre-built statements that only need to be filled with the user input, respectively.</li>
<li><b><u>Encoded</u></b>: This is used to prevent XSS attacks, where UTF encoding is used instead of symbols in input fields that use javascript.</li>
<li><b><u>Secure</u></b>: This website uses encoding and prepared statements to create a website that is secure against code injection attacks.</li>
</ol>

Note: All SQLi attacks on these websites were performed using SQLMap.
