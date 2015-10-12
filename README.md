# Domain lookup

A simple domain lookup class to provide DNS records, WHOIS information, hosting and name server providers.

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
 - Provider of the mailboxes

The class will attempt to look up which company is providing the hosting for the current domain, by checking the A records and resolving the IP address to a hostname. A WHOIS query is run on the hostname to provide the registrant. The same process is used to determine the company who controls the name servers.

Where name servers are generic or used by many companies, a whitelist can be provided to associate known name servers with a company name.

## Basic usage

The following example shows how you can display the domain registrar, the hosting company and the A records associated with a domain.

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    
    echo $domain->registrar();
    echo $domain->hosting();
    echo $domain->email();
    var_dump($domain->a());

## Methods

- [__construct()](#__construct) - Create an instance
- [tld()](#tld) - Get the TLD
- [domain()](#domain) - Get the domain
- [rootDomain()](#rootdomain) - Get the root domain
- [a()](#a) - Get the A records
- [aaaa()](#aaaa) - Get the AAAA records
- [mx()](#mx) - Get the MX records
- [mx()](#mx) - Get the MX records
- [txt()](#txt) - Get the TXT records
- [ns()](#ns) - Get the NS records
- [cname()](#cname) - Get the CNAME records
- [registrar()](#registrar) - Get the registrar's name
- [tag()](#tag) - Get the tag
- [created()](#created) - Get the created date
- [updated()](#updated) - Get the updated date
- [expiry()](#expiry) - Get the expiry date
- [registrant()](#registrant) - Get the registrant's name
- [hosting()](#hosting) - Get the hosting provider's name
- [nameservers()](#nameservers) - Get the name server provider's name
- [email()](#email) - Get the mailbox provider's name

### __construct()

Initialise the domainLookup class.

>__construct([str $domain [,str $whitelist]])

Sets the domain to be used by the lookup functions and specifies a path to a whilelist file, when performing registrar lookups on name servers. An exception will be thrown if the domain name appears to be invalid, or the class does not have an associated WHOIS server for the TLD. See [Using the whitelist](#using-the-whitelist)

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk', 'nameservers.json');

***

### tld()

Returns the TLD of the domain name.

>str tld()

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->tld();

**The example above will output**

    .co.uk

***

### domain()

Returns the full domain name.

>str domain()

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->domain();

**The example above will output**

    castlegateit.co.uk

***

### rootDomain()

Returns the full domain name.

>str rootDomain()

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('www.castlegateit.co.uk');
    echo $domain->rootDomain();

**The example above will output**

    castlegateit.co.uk

***

### a()

Returns an array of A records

>bool|array a()

Returns an array of A records containing details of the record type, ttl, ipv4 address and the host address. This method returns false on failure and an empty array when no records are found.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    var_dump($domain->a());

**The example above will output**

    array (size=1)
      0 => 
        array (size=4)
          'host' => string 'castlegateit.co.uk' (length=18)
          'ttl' => int 10800
          'type' => string 'A' (length=1)
          'ipv4' => string '46.43.57.77' (length=11)

***

### aaaa()

Returns an array of A records

>bool|array aaaa()

Returns an array of AAAA records containing details of the record type, ttl, ipv6 address and the host address. This method returns false on failure and an empty array when no records are found.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('google.co.uk');
    var_dump($domain->aaaa());

**The example above will output**

    array (size=1)
      0 => 
        array (size=4)
          'host' => string 'google.co.uk' (length=12)
          'ttl' => int 37
          'type' => string 'AAAA' (length=4)
          'ipv6' => string '2a00:1450:4009:801::2003' (length=24)

***

### mx()

Returns an array of MX records

>bool|array mx()

Returns an array of MX records containing details of the record type, ttl, priority, target domain and the host address. This method returns false on failure and an empty array when no records are found.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    var_dump($domain->mx());

**The example above will output**

    array (size=1)
      0 => 
        array (size=5)
          'host' => string 'castlegateit.co.uk' (length=18)
          'ttl' => int 34
          'type' => string 'MX' (length=2)
          'pri' => int 1
          'target' => string 'aspmx.l.google.com' (length=18)

***

### txt()

Returns an array of TXT records

>bool|array txt()

Returns an array of TXT records containing details of the record type, ttl, txt value and the host address. This method returns false on failure and an empty array when no records are found.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    var_dump($domain->txt());

**The example above will output**

    array (size=1)
      0 => 
        array (size=4)
          'host' => string 'castlegateit.co.uk' (length=18)
          'ttl' => int 10800
          'type' => string 'TXT' (length=3)
          'txt' => string 'v=spf1 mx a ip4:46.43.57.77 ip4:212.110.172.230 ~all' (length=52)

***

### ns()

Returns an array of NS (name server) records

>bool|array ns()

Returns an array of NS records containing details of the record type, ttl, target domain and the host address. This method returns false on failure and an empty array when no records are found.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    var_dump($domain->ns());

**The example above will output**

    array (size=2)
      0 => 
        array (size=4)
          'host' => string 'castlegateit.co.uk' (length=18)
          'ttl' => int 7145
          'type' => string 'NS' (length=2)
          'target' => string 'ns.mainnameserver.com' (length=21)
      1 => 
        array (size=4)
          'host' => string 'castlegateit.co.uk' (length=18)
          'ttl' => int 7145
          'type' => string 'NS' (length=2)
          'target' => string 'ns2.mainnameserver.com' (length=22)

***

### cname()

Returns an array of CNAME records

>bool|array cname()

Returns an array of NS records containing details of the record type, ttl, target domain and the host address. This method returns false on failure and an empty array when no records are found.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('mail.google.com');
    var_dump($domain->cname());

**The example above will output**

    array (size=1)
      0 => 
        array (size=4)
          'host' => string 'mail.google.com' (length=15)
          'ttl' => int 86400
          'type' => string 'CNAME' (length=5)
          'target' => string 'googlemail.l.google.com' (length=23)

***

### registrar()

Returns the domain's registrar.

>bool|str registrar()

Returns the domain's registrar as queried from WHOIS data. Returns a string on success and false on failure if WHOIS data cannot be obtained.

Since this information is obtained via WHOIS data, this method will fail if the domain contains sub domain's. A root domain must be used.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->registrar();

**The example above will output**

    Fasthosts Internet Ltd

***

### tag()

Returns the domain's tag.

>bool|str tag()

Returns the domain's tag as queried from WHOIS data. Returns a string on success and false on failure if WHOIS data cannot be obtained.

Since this information is obtained via WHOIS data, this method will fail if the domain contains sub domain's. A root domain must be used.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->tag();

**The example above will output**

    LIVEDOMAINS

***

### created()

Returns the domain's created time as a unix timestamp.

>bool|int created()

Returns the domain's created date as queried from WHOIS data. Returns a unix timestamp on success and false on failure if WHOIS data cannot be obtained.

Since this information is obtained via WHOIS data, this method will fail if the domain contains sub domain's. A root domain must be used.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->created();
    echo "<br />";
    echo date('d/m/Y', $domain->created());

**The example above will output**

    1319846400
    29/10/2011

***

### updated()

Returns the domain's updated time as a unix timestamp.

>bool|int updated()

Returns the domain's updated date as queried from WHOIS data. Returns a unix timestamp on success and false on failure if WHOIS data cannot be obtained.

Since this information is obtained via WHOIS data, this method will fail if the domain contains sub domain's. A root domain must be used.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->updated();
    echo "<br />";
    echo date('d/m/Y', $domain->updated());

**The example above will output**

    1433721600
    08/06/2015

***

### expiry()

Returns the domain's expiry time as a unix timestamp.

>bool|int expiry()

Returns the domain's expiry date as queried from WHOIS data. Returns a unix timestamp on success and false on failure if WHOIS data cannot be obtained.

Since this information is obtained via WHOIS data, this method will fail if the domain contains sub domain's. A root domain must be used.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->expiry();
    echo "<br />";
    echo date('d/m/Y', $domain->expiry());

**The example above will output**

    1446076800
    29/10/2015

***

### expires()

Returns the domain's expiry time as a unix timestamp.

>bool|int expires()

Alias of `expiry()`

***

### registrant()

Returns the domain's registrant.

>bool|str registrant()

Returns the domain's registrant as queried from WHOIS data. Returns a string on success and false on failure if WHOIS data cannot be obtained.

Since this information is obtained via WHOIS data, this method will fail if the domain contains sub domain's. A root domain must be used.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->registrant();

**The example above will output**

    Castlegate IT Limited

***

### hosting()

Returns the domain's hosting provider.

>bool|str hosting()

Returns the domain's hosting provider by checking the first A record associated with the domain, and resolving the IP address to a hostname. A WHOIS query is then run on the root domain of the hostname, and the registrar is returned.

This method will return a string on success and false on failure. This method will fail if the domain does not have A records, the IP to hostname lookup fails, or the WHOIS request fails for the hostname's root domain.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->hosting();

**The example above will output**

    Bytemark Computer Consulting Ltd. T/a Bytemark Hosting

***

### nameservers()

Returns the domain's nameserver provider.

>bool|str nameservers()

Returns the domain's nameserver provider by checking a whitelist, provided in the class constructor, and then running a WHOIS query on the name server's root domain.

This method will return a string on success and false on failure. This method will fail if the domain does not name servers or the WHOIS request fails for the nameserver's root domain.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->nameservers();

**The example above will output**

    Mesh Digital Limited

#### Using the whitelist

If a whitelist is provided, a name can be associated with nameservers. This is useful when you know the provider of the nameservers, but the lookup provides a different company name, perhaps a parent company. The whitelist is a JSON array of company names and name servers.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk', 'whitelist.json');
    echo $domain->nameservers();

**The example above will output**

    Heart Internet

**Example whitelist JSON file**

An exception will be thrown if the whitelist file cannot be opened or cannot be parsed as JSON.

    [
        {
            "name"    : "Bytemark",
            "records" : [
                "a.ns.bytemark.co.uk",
                "b.ns.bytemark.co.uk",
                "c.ns.bytemark.co.uk"
            ]
        },
        {
            "name"    : "Heart Internet",
            "records" : [
                "ns.heartinternet.com",
                "ns2.heartinternet.com",
                "ns.mainnameserver.com",
                "ns2.mainnameserver.com"
            ]
        }
    ]

***

### email()

Returns the domain's mailbox provider.

>bool|str email()

Returns the domain's mailbox provider by checking MX records. The first MX record is resolved to an IP address and then a PTR record is checked. The domain name in the PTR record is then looked up via WHOIS and the registrar is returned.

This does not work well for email with large corporations who use identity protection companies, who are the registrant for their domains.

This method will return a string on success and false on failure. This method will fail if the domain does not name servers or the WHOIS request fails for the name server's root domain.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('cgit.co.uk');
    echo $domain->email();

**The example above will output**

    Heart Internet Ltd T/a Heart Internet 

### whois()

Returns the domain's WHOIS data.

>bool|str whois()

Returns the domain's WHOIS data. This method will return a string on success and false on failure.

**Example**

    $domain = new CastlegateIt\Tools\DomainLookup('castlegateit.co.uk');
    echo $domain->whois();

**The example above will output**

    Domain name:
        castlegateit.co.uk

    Registrant:
        Castlegate IT Limited

    Registrant type:
        UK Limited Company
    
    Registrant's address:
    
    ...