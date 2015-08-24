# Domain lookup

A simple domain lookup class to provide DNS records, WHOIS information and hosting provider.

The class can be used to lookup the following information:

 - A records
 - AAAA records
 - CNAME records
 - TXT records
 - MX records
 - WHOIS data
 - Domain registrar
 - Domain tag
 - Domain creation, update and expiry dates
 - Domain name servers
 - Domain registrant
 - Provider of the hosting as pointed to by A records
 - Provider of the name servers

The class will attempt to look up which company is providing the hosting for the current domain by first checking the A records and resolving the IP address to a hostname. This hostname is queried via a WHOIS to provide the registrant. The same process is used to determine the company who controls the name servers.

Where name servers are generic or used by many companies, a whitelist can be provided to associate known name servers with a company name.
