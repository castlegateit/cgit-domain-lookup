<?php namespace CastlegateIt\Tools;

class DomainLookup
{
    /**
     * Whois server for support TLDs
     *
     * @var array
     */
    private $whois_servers = array(
        'ac'     => 'whois.nic.ac',
        'ae'     => 'whois.aeda.net.ae',
        'aero'   => 'whois.aero',
        'af'     => 'whois.nic.af',
        'ag'     => 'whois.nic.ag',
        'al'     => 'whois.ripe.net',
        'am'     => 'whois.amnic.net',
        'as'     => 'whois.nic.as',
        'asia'   => 'whois.nic.asia',
        'at'     => 'whois.nic.at',
        'au'     => 'whois.aunic.net',
        'ax'     => 'whois.ax',
        'az'     => 'whois.ripe.net',
        'ba'     => 'whois.ripe.net',
        'be'     => 'whois.dns.be',
        'bg'     => 'whois.register.bg',
        'bi'     => 'whois.nic.bi',
        'biz'    => 'whois.neulevel.biz',
        'bj'     => 'www.nic.bj',
        'br'     => 'whois.nic.br',
        'br.com' => 'whois.centralnic.com',
        'bt'     => 'whois.netnames.net',
        'by'     => 'whois.cctld.by',
        'bz'     => 'whois.belizenic.bz',
        'ca'     => 'whois.cira.ca',
        'cat'    => 'whois.cat',
        'cc'     => 'whois.nic.cc',
        'cd'     => 'whois.nic.cd',
        'ch'     => 'whois.nic.ch',
        'ck'     => 'whois.nic.ck',
        'cl'     => 'whois.nic.cl',
        'cn'     => 'whois.cnnic.net.cn',
        'cn.com' => 'whois.centralnic.com',
        'co'     => 'whois.nic.co',
        'co.uk'  => 'whois.nic.uk',
        'co.nl'  => 'whois.co.nl',
        'com'    => 'whois.tucows.com',
        'coop'   => 'whois.nic.coop',
        'cx'     => 'whois.nic.cx',
        'cy'     => 'whois.ripe.net',
        'cz'     => 'whois.nic.cz',
        'de'     => 'whois.denic.de',
        'dk'     => 'whois.dk-hostmaster.dk',
        'dm'     => 'whois.nic.cx',
        'dz'     => 'whois.nic.dz',
        'edu'    => 'whois.educause.net',
        'ee'     => 'whois.tld.ee',
        'eg'     => 'whois.ripe.net',
        'es'     => 'whois.nic.es',
        'eu'     => 'whois.eu',
        'eu.com' => 'whois.centralnic.com',
        'fi'     => 'whois.ficora.fi',
        'fo'     => 'whois.nic.fo',
        'fr'     => 'whois.nic.fr',
        'gb'     => 'whois.ripe.net',
        'gb.com' => 'whois.centralnic.com',
        'gb.net' => 'whois.centralnic.com',
        'qc.com' => 'whois.centralnic.com',
        'ge'     => 'whois.ripe.net',
        'gl'     => 'whois.nic.gl',
        'gm'     => 'whois.ripe.net',
        'gov'    => 'whois.nic.gov',
        'gr'     => 'whois.ripe.net',
        'gs'     => 'whois.nic.gs',
        'hk'     => 'whois.hknic.net.hk',
        'hm'     => 'whois.registry.hm',
        'hn'     => 'whois2.afilias-grs.net',
        'hr'     => 'whois.dns.hr',
        'hu'     => 'whois.nic.hu',
        'hu.com' => 'whois.centralnic.com',
        'id'     => 'whois.pandi.or.id',
        'ie'     => 'whois.domainregistry.ie',
        'il'     => 'whois.isoc.org.il',
        'in'     => 'whois.inregistry.net',
        'info'   => 'whois.afilias.info',
        'int'    => 'whois.isi.edu',
        'io'     => 'whois.nic.io',
        'iq'     => 'vrx.net',
        'ir'     => 'whois.nic.ir',
        'is'     => 'whois.isnic.is',
        'it'     => 'whois.nic.it',
        'je'     => 'whois.je',
        'jobs'   => 'jobswhois.verisign-grs.com',
        'jp'     => 'whois.jprs.jp',
        'ke'     => 'whois.kenic.or.ke',
        'kg'     => 'whois.domain.kg',
        'kr'     => 'whois.nic.or.kr',
        'la'     => 'whois2.afilias-grs.net',
        'li'     => 'whois.nic.li',
        'lt'     => 'whois.domreg.lt',
        'lu'     => 'whois.restena.lu',
        'lv'     => 'whois.nic.lv',
        'ly'     => 'whois.lydomains.com',
        'ma'     => 'whois.iam.net.ma',
        'mc'     => 'whois.ripe.net',
        'md'     => 'whois.nic.md',
        'me'     => 'whois.nic.me',
        'mil'    => 'whois.nic.mil',
        'mk'     => 'whois.ripe.net',
        'mobi'   => 'whois.dotmobiregistry.net',
        'ms'     => 'whois.nic.ms',
        'mt'     => 'whois.ripe.net',
        'mu'     => 'whois.nic.mu',
        'mx'     => 'whois.nic.mx',
        'my'     => 'whois.mynic.net.my',
        'name'   => 'whois.nic.name',
        'net'    => 'whois.tucows.com',
        'net.uk' => 'whois.nic.uk',
        'nf'     => 'whois.nic.cx',
        'ng'     => 'whois.nic.net.ng',
        'nl'     => 'whois.domain-registry.nl',
        'no'     => 'whois.norid.no',
        'no.com' => 'whois.centralnic.com',
        'nu'     => 'whois.nic.nu',
        'nz'     => 'whois.srs.net.nz',
        'org'    => 'whois.pir.org',
        'pl'     => 'whois.dns.pl',
        'pr'     => 'whois.nic.pr',
        'pro'    => 'whois.registrypro.pro',
        'pt'     => 'whois.dns.pt',
        'pw'     => 'whois.nic.pw',
        'ro'     => 'whois.rotld.ro',
        'ru'     => 'whois.tcinet.ru',
        'sa'     => 'saudinic.net.sa',
        'sa.com' => 'whois.centralnic.com',
        'sb'     => 'whois.nic.net.sb',
        'sc'     => 'whois2.afilias-grs.net',
        'se'     => 'whois.nic-se.se',
        'se.com' => 'whois.centralnic.com',
        'se.net' => 'whois.centralnic.com',
        'sg'     => 'whois.nic.net.sg',
        'sh'     => 'whois.nic.sh',
        'si'     => 'whois.arnes.si',
        'sk'     => 'whois.sk-nic.sk',
        'sm'     => 'whois.nic.sm',
        'st'     => 'whois.nic.st',
        'so'     => 'whois.nic.so',
        'su'     => 'whois.tcinet.ru',
        'tc'     => 'whois.adamsnames.tc',
        'tel'    => 'whois.nic.tel',
        'tf'     => 'whois.nic.tf',
        'th'     => 'whois.thnic.net',
        'tj'     => 'whois.nic.tj',
        'tk'     => 'whois.nic.tk',
        'tl'     => 'whois.domains.tl',
        'tm'     => 'whois.nic.tm',
        'tn'     => 'whois.ati.tn',
        'to'     => 'whois.tonic.to',
        'tp'     => 'whois.domains.tl',
        'tr'     => 'whois.nic.tr',
        'travel' => 'whois.nic.travel',
        'tw'     => 'whois.twnic.net.tw',
        'tv'     => 'whois.nic.tv',
        'tz'     => 'whois.tznic.or.tz',
        'ua'     => 'whois.ua',
        'uk'     => 'whois.nic.uk',
        'uk.com' => 'whois.centralnic.com',
        'uk.net' => 'whois.centralnic.com',
        'ac.uk'  => 'whois.ja.net',
        'org.uk' => 'whois.nic.uk',
        'gov.uk' => 'whois.ja.net',
        'us'     => 'whois.nic.us',
        'us.com' => 'whois.centralnic.com',
        'uy'     => 'nic.uy',
        'uy.com' => 'whois.centralnic.com',
        'uz'     => 'whois.cctld.uz',
        'va'     => 'whois.ripe.net',
        'vc'     => 'whois2.afilias-grs.net',
        've'     => 'whois.nic.ve',
        'vg'     => 'whois.adamsnames.tc',
        'ws'     => 'whois.website.ws',
        'xxx'    => 'whois.nic.xxx',
        'yu'     => 'whois.ripe.net',
        'za.com' => 'whois.centralnic.com'
    );

    /**
     * Exception message prefix
     *
     * @var string
     */
    private $exception = 'CGIT Domain Lookup: ';

    /**
     * Domain name
     *
     * @var bool|array
     */
    private $domain;

    /**
     * A records
     *
     * @var bool|array
     */
    private $a = false;

    /**
     * AAAA records
     *
     * @var bool|array
     */
    private $aaaa = false;

    /**
     * MX records
     *
     * @var bool|array
     */
    private $mx = false;

    /**
     * TXT records
     *
     * @var bool|array
     */
    private $txt = false;

    /**
     * NS records
     *
     * @var bool|array
     */
    private $ns = false;

    /**
     * CNAME records
     *
     * @var bool|array
     */
    private $cname = false;

    /**
     * WHOIS information
     *
     * @var bool|string
     */
    private $whois = false;

    /**
     * Domain registrar
     *
     * @var bool|string
     */
    private $registrar = false;

    /**
     * Domain registrant
     *
     * @var bool|string
     */
    private $registrant = false;

    /**
     * Domain created date
     *
     * @var bool|int
     */
    private $created = false;

    /**
     * Domain updated date
     *
     * @var bool|int
     */
    private $updated = false;

    /**
     * Domain expiry date
     *
     * @var bool|int
     */
    private $expiry = false;

    /**
     * Domain tag
     *
     * @var bool|string
     */
    private $tag = false;

    /**
     * Hosting server registrar
     *
     * @var bool|string
     */
    private $hosting = false;

    /**
     * Email server registrar
     *
     * @var bool|string
     */
    private $email = false;

    /**
     * Nameserver registrar
     *
     * @var bool
     */
    private $nameservers = false;

    /**
     * Path to a whitelist JSON file
     *
     * @var string
     */
    private $ns_whitelist = false;

    private $cache_dir;

    private $cache_duration = 30;

    /**
     * Sets the domain name for the lookup functions.
     *
     * @param  string $domain
     * @return void
     */
    public function __construct($domain, $cache_dir = '/tmp', $ns_whitelist = false)
    {
        // Set cache location
        $this->cache_dir = $cache_dir;

        // Check the cache is writable
        if (!$this->cacheCheck()) {
            throw new \Exception($this->exception . 'Cache directory is not writable (' . $cache_dir . ')');
        } else {
            $this->cacheClean();
        }

        // Set the member variable
        $this->domain = trim($domain);
        $this->ns_whitelist = $ns_whitelist;

        // Regex for validating domain names
        $tld = implode('|', array_keys($this->whois_servers));
        $pattern = '#(?:[a-zA-Z0-9.-]+?\.(?:' . $tld . '))$#';

        // Throw an exception if we did not match
        if (!preg_match($pattern, $domain)) {
            throw new \Exception($this->exception . 'Domain name is invalid or the TLD is not known.');
        }
    }

    /**
     * Returns the TLD portion of the domain.
     *
     * @return string
     */
    public function tld()
    {
        $matches = array();

        // Search for matches
        foreach (array_keys($this->whois_servers) as $tld) {

            for ($i = strlen($this->domain); $i > 0; $i--) {

                $check = substr($this->domain, $i, strlen($this->domain));

                if ($check == '.' . $tld) {
                    $matches[] = $tld;
                    continue 2;
                }
            }
        }

        // Return the longest match
        if (count($matches) > 1) {
            $match_length = array_map('strlen', $matches);
            $match_compare = array_keys($match_length, max($match_length));
            return $matches[reset($match_compare)];
        }

        return $matches[0];
    }

    /**
     * Returns the domain name.
     *
     * @return string
     */
    public function domain()
    {
        return $this->domain;
    }

    /**
     * Returns the domain name - minus any sub-domains.
     *
     * @return string
     */
    public function rootDomain()
    {
        // Get the TLD
        $tld = $this->tld($this->domain);

        // Remove the TLD
        $domain = substr($this->domain, 0, strlen($this->domain) - (strlen($tld) + 1));

        // Extract the last item when split by a period
        $parts = explode('.', $domain);

        return end($parts) . '.' . $tld;
    }

    /**
     * Returns an array of A records
     *
     * @return bool|array
     */
    public function a()
    {
        if (!$this->a) {
            $result = $this->cleanDnsRecord(dns_get_record($this->domain, DNS_A));
            if (is_array($result)) {
                $this->a = $result;
            }
        }

        return $this->a;
    }

    /**
     * Get an array of AAAA records
     *
     * @return bool|array
     */
    public function aaaa()
    {
        if (!$this->aaaa) {
            $result = $this->cleanDnsRecord(dns_get_record($this->domain, DNS_AAAA));
            if (is_array($result)) {
                $this->aaaa = $result;
            }
        }

        return $this->aaaa;
    }

    /**
     * Get an array of MX records
     *
     * @return bool|array
     */
    public function mx()
    {
        if (!$this->mx) {
            $result = $this->cleanDnsRecord(dns_get_record($this->domain, DNS_MX));
            if (is_array($result)) {
                $this->mx = $result;
            }
        }

        return $this->mx;
    }

    /**
     * Get an array of TXT records
     *
     * @return bool|array
     */
    public function txt()
    {
        if (!$this->txt) {
            $result = $this->cleanDnsRecord(dns_get_record($this->domain, DNS_TXT));
            if (is_array($result)) {
                $this->txt = $result;
            }
        }

        return $this->txt;
    }

    /**
     * Get and array of NS records
     *
     * @return bool|array
     */
    public function ns()
    {
        if (!$this->ns) {
            $result = $this->cleanDnsRecord(dns_get_record($this->domain, DNS_NS));
            if (is_array($result)) {
                $this->ns = $result;
            }
        }

        return $this->ns;
    }

    /**
     * Get an array of CNAME records
     *
     * @return bool|array
     */
    public function cname()
    {
        if (!$this->cname) {
            $result = $this->cleanDnsRecord(dns_get_record($this->domain, DNS_CNAME));
            if (is_array($result)) {
                $this->cname = $result;
            }
        }

        return $this->cname;
    }

    /**
     * Returns the registrar of the root domain, extracting it from WHOIS data.
     *
     * @return string
     */
    public function registrar()
    {
        // Return it if we've already looked it up
        if ($this->registrar) {
            return $this->registrar;
        }

        // If this is no WHOIS data already, attempt to get it
        if (!$this->whois) {
            $whois = $this->whois();
        }

        // WHOIS was successful
        if ($this->whois) {

            // 1st extract attempt
            preg_match(
                '#(?:Registration\sService\sProvider:\s*)(.*)(?:,)#',
                $this->whois,
                $first
            );

            if ($first && count($first) > 1) {
                $this->registrar = trim($first[1]);
                return $this->registrar;
            }

            // 2nd extract attempt
            preg_match(
                '#(?:sponsoring\s)?registrar:\s*(.*)\s(?=\[)?#',
                strtolower($this->whois),
                $second
            );

            // Get the last match
            if ($second) {

                $registrar = ucwords(strtolower(end($second)));

                // Remove the ISP tag
                $this->registrar = trim(preg_replace('#\[.*\]#', '', $registrar));
            }
        }

        return $this->registrar;
    }

    /**
     * Returns the IPS tag.
     *
     * @return string
     */
    public function tag()
    {
        // Return it if we've already looked it up
        if ($this->tag) {
            return $this->tag;
        }

        // If this is no WHOIS data already, attempt to get it
        if (!$this->whois) {
            $whois = $this->whois();
        }

        // WHOIS was successful
        if ($this->whois) {

            // Extract the registrar
            preg_match(
                '#\[tag\s=\s(.*)\]#',
                strtolower($this->whois),
                $matches
            );

            // Get the last match
            if ($matches) {

                $this->tag = trim(strtoupper(end($matches)));
            }
        }

        return $this->tag;
    }

    /**
     * Returns the domain's updated time.
     *
     * @return string
     */
    public function updated()
    {
        // Return it if we've already looked it up
        if ($this->updated) {
            return $this->updated;
        }

        // If this is no WHOIS data already, attempt to get it
        if (!$this->whois) {
            $whois = $this->whois();
        }

        // WHOIS was successful
        if ($this->whois) {

            // Extract the registrar
            preg_match(
                '#(last updated|updated date):\s+(.*)#',
                strtolower($this->whois),
                $matches
            );

            // Get the last match
            if ($matches) {

                $this->updated = strtotime(trim(end($matches)));
            }
        }

        return $this->updated;
    }

    /**
     * Returns the domain's created time.
     *
     * @return string
     */
    public function created()
    {
        // Return it if we've already looked it up
        if ($this->created) {
            return $this->created;
        }

        // If this is no WHOIS data already, attempt to get it
        if (!$this->whois) {
            $whois = $this->whois();
        }

        // WHOIS was successful
        if ($this->whois) {

            // Extract the registrar
            preg_match(
                '#(registered on|creation date):\s+(.*)#',
                strtolower($this->whois),
                $matches
            );

            // Get the last match
            if ($matches) {

                $this->created = strtotime(trim(end($matches)));
            }
        }

        return $this->created;
    }

    /**
     * Returns the domain's expiry time.
     *
     * @return string
     */
    public function expiry()
    {
        // Return it if we've already looked it up
        if ($this->expiry) {
            return $this->expiry;
        }

        // If this is no WHOIS data already, attempt to get it
        if (!$this->whois) {
            $whois = $this->whois();
        }

        // WHOIS was successful
        if ($this->whois) {

            // Extract the registrar
            preg_match(
                '#expir(y|ation) date:\s+(.*)#',
                strtolower($this->whois),
                $matches
            );

            // Get the last match
            if ($matches) {

                $this->expiry = strtotime(trim(end($matches)));
            }
        }

        return $this->expiry;
    }

    /**
     * Alias of expiry().
     *
     * @return string
     */
    public function expires()
    {
        return $this->expiry();
    }

    /**
     * Returns the domain's registrant.
     *
     * @return string
     */
    public function registrant()
    {
        // Return it if we've already looked it up
        if ($this->registrant) {
            return $this->registrant;
        }

        // If this is no WHOIS data already, attempt to get it
        if (!$this->whois) {
            $whois = $this->whois();
        }

        // WHOIS was successful
        if ($this->whois) {

            // Extract the registrar
            preg_match(
                '#registrant(?:\sname)?:\s*(.*)\s(?=\[)?#',
                strtolower($this->whois),
                $matches
            );

            // Get the last match
            if ($matches) {

                $this->registrant = trim(end($matches));
            }
        }

        return $this->registrant;
    }

    /**
     * Returns the registrar associated with the hosting (A records) by getting
     * a host name for the A record's IP address. The root domain is then
     * looked up and a whois performed. This is performed on each A record.
     *
     * @return string
     */
    public function hosting()
    {
        // Return it if we've already looked it up
        if ($this->hosting) {
            return $this->hosting;
        }

        // Get the domain's A records
        $a_records = $this->a();

        // Fail if there are no records or it's not possible to get them
        if (!$a_records) {
            return false;
        }

        // Get the first A record and find the IP address
        $a_record = reset($a_records);
        $ip = $a_record['ipv4'];

        // Attempt to get a host for the IP
        // (fails if the return value is the IP)
        $host = gethostbyaddr($ip);
        if ($host == $ip) {
            return false;
        }

        // Try to create a new instance for this hostname
        try {
            $hosting = new static($host, $this->cache_dir, $this->ns_whitelist);
        }
        catch (Exception $e) {
            return false;
        }
        $this->hosting = $hosting->registrar();

        return $this->hosting;
    }

    /**
     * Returns the registrar associated with the name servers (NS records) by
     * looking through a known list. The root domain is then looked up and a
     * WHOIS is performed.
     *
     * @return string
     */
    public function nameservers()
    {
        // Return it if we've already looked it up
        if ($this->hosting) {
            return $this->hosting;
        }

        // Fail if we cannot get the current name servers
        if (!($nameservers = $this->ns())) {
            return false;
        }

        // Begin by checking a whitelist since some companies share nameservers
        if ($this->ns_whitelist) {

            if (file_exists($this->ns_whitelist)) {

                // Load the whitelist
                $whitelists = json_decode(file_get_contents($this->ns_whitelist));

                // Check for valid JSON
                if (!$whitelists|| !is_array($whitelists)) {
                    throw new \Exception($this->exception . 'White list file is not valid json');
                };

                // Extract the `target` key from the array of nameservers
                $real_nameservers = array_map(function($a){return $a['target'];}, $nameservers);


                // Loop through whitelist companies
                foreach ($whitelists as $whitelist) {
                    if (is_object($whitelist)) {

                        // Loop through each whitelist record
                        foreach ($whitelist->records as $whitelist_record) {
                            // Compare against actual NS records
                            foreach ($real_nameservers as $nameserver) {
                                if ($nameserver == $whitelist_record) {
                                    return $whitelist->name;
                                }
                            }
                        }
                    }
                }
            }
            else {
                throw new \Exception($this->exception . 'Whitelist file does not exist');
            }
        }

        // If we've reached this far, there is no whitelist or selection from it
        // returned no results. Look up the registrar of the nameserver's root
        // domain.
        $first_ns = reset($nameservers);
        $host = $first_ns['target'];

        // Try to create a new instance for this hostname
        try {
            $ns = new static($host, $this->cache_dir, $this->ns_whitelist);
        }
        catch (Exception $e) {
            return false;
        }

        $this->nameservers = $ns->registrar();

        return $this->nameservers;
    }

    /**
     * Returns the registrar associated with the domains email. MX records are
     * checked, and an IP is resolved from the first MX record. The PTR record
     * is checked to find the IP owner and it's domain is queried via WHOIS to
     * get the registrant. This does not work well for email with large
     * corporations who use identity protection companies, who are the
     * registrant for their domains.
     *
     * @return string
     */
    public function email()
    {
        // Return it if we've already looked it up
        if ($this->email) {
            return $this->email;
        }

        // Get the domain's MX records
        $mx_records = $this->mx();

        // Fail if there are no records or it's not possible to get them
        if (!$mx_records) {
            return false;
        }

        // Check only the first MX record
        $first_mx = reset($mx_records);
        $host = $first_mx['target'];

        // MX records contain a domain name (usually the same domain) such as
        // mail.example.com so a standard lookup of the domain does not work
        // here. Resolve the domain to an IP address (gethostbyname) and then
        // get the PTR record for that IP (gethostbyaddr) to get a domain name
        // for the mail server. We then lookup the registrar of this domain.
        $ip = gethostbyname($host);
        $mail_server = gethostbyaddr($ip);

        // If the mail_server == the IP then there is no PTR record
        if ($mail_server == $ip) {
            return false;
        }

        // Try to create a new instance for this hostname
        try {
            $mx = new static($mail_server, $this->cache_dir, $this->ns_whitelist);
        }
        catch (Exception $e) {
            return false;
        }

        $this->email = $mx->registrar();

        return $this->email;
    }

    /**
     * Send a WHOIS query.
     *
     * @return string
     */
    public function whois()
    {
        // If we've not already checked in this instance
        if (!$this->whois) {

            // Check the cache first
            if ($cache = $this->cacheGet('whois-' . $this->domain())) {
                $this->whois = $cache;
                return $this->whois;
            }

            // Query the whois servers
            if ($result = $this->queryWhois()) {
                $this->whois = $result;
                $this->cacheStore('whois-' . $this->domain(), $result);
            }
        }

        return $this->whois;
    }

    /**
     * Performs a whois query to the relevant whois server.
     *
     * @return string
     */
    private function queryWhois()
    {
        $port = 43;

        $timeout = 10;

        $tld = $this->tld($this->domain);

        // Check we have a whois server for the TLD
        if (!isset($this->whois_servers[$tld])) {
            return false;
        }
        $whois_server = $this->whois_servers[$tld];

        // Open the socket
        $socket = @fsockopen(
            $whois_server,
            $port,
            $errno,
            $errstr,
            $timeout
        );

        if (!$socket) {
            return false;
        }

        // Send request
        fputs($socket, $this->rootDomain() . "\r\n");

        // Output variable
        $out = "";

        // Read result
        while(!feof($socket)) {
            $out.= fgets($socket);
        }

        // Close socket
        fclose($socket);

        // Any match?
        if (stristr(strtolower($out), 'no match') || stristr(strtolower($out), 'error for')) {
            return false;
        }

        return $out;
    }

    /**
     * Strips out redundant indexes from the return values of DNS record methods
     *
     * @param  array $array
     * @return array
     */
    private function cleanDnsRecord($array)
    {
        foreach ($array as $key => $value) {

            // Remove redundant return values
            if (isset($value['class'])) {
                unset($array[$key]['class']);
            }
            if (isset($value['entries'])) {
                unset($array[$key]['entries']);
            }

            // Rename ip to ipv4 for clarity
            if (isset($value['ip'])) {
                $array[$key]['ipv4'] = $value['ip'];
                unset($array[$key]['ip']);
            }
        }

        return $array;
    }

    /**
     * Set the cache duration in seconds
     *
     * @param int $seconds
     * @return void
     */
    public function setCacheDuration($seconds) {
        $this->cache_duration = $seconds;
    }

    /**
     * Check the cache is writable
     *
     * @return boolean
     */
    private function cacheCheck()
    {
        return is_writable($this->cache_dir);
    }

    /**
     * Check the cache is writable
     *
     * @param  string $key
     * @return string
     */
    private function cacheFile($key)
    {
        return $this->cache_dir . '/' . $key;
    }

    /**
     * Check a cached key exists
     *
     * @param  string $key
     * @return boolean
     */
    private function cacheExists($key)
    {
        return is_file($this->cacheFile($key));
    }

    /**
     * Check if a cached key has expired
     *
     * @param  string $key
     * @return boolean
     */
    private function cacheExpired($key)
    {
        return (filemtime($this->cacheFile($key)) + $this->cache_duration) < time();
    }

    /**
     * Load a cached key's data, or false if the key does not exist
     *
     * @param  string $key
     * @return string|boolean
     */
    private function cacheGet($key)
    {
        if ($this->cacheExists($key) && !$this->cacheExpired($key)) {
            return file_get_contents($this->cacheFile($key));
        }

        return false;
    }

    /**
     * Save a value against a cache key
     *
     * @param  string $key
     * @param  string $contents
     * @return void
     */
    private function cacheStore($key, $contents)
    {
        file_put_contents($this->cacheFile($key), $contents);
    }

    /**
     * Remove any expired cache files
     *
     * @return void
     */
    private function cacheClean() {
        if ($handle = opendir($this->cache_dir)) {
            while (false !== ($key = readdir($handle))) {
                if ($this->cacheExpired($key) && $key != '.' && $key != '..') {
                    unlink($this->cacheFile($key));
                }
            }
            closedir($handle);
        }
    }
}

