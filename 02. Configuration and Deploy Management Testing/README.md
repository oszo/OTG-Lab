<h4 align="center">OTG-Lab - CTF Lab follow OWASP Testing Guide v4</h4>

## 2. Configuration and Deploy Management Testing

### Challenge Order:

#### Lab-I

Target of this lab is on follows URLs:

* http://[DockerIP]:52021

This lab has 1 flags as follows topic:

- Infrastructure Configuration
- Application Platform Configuration
- Enumerate Infrastructure and Application Interfaces

Review file `engin1-config.tar.gz` and `web1.tar.gz` with above topics


#### Lab-II

Target of this lab is on follows URLs:

* http://[DockerIP]:52022

This lab has 1 flags as follows topic:

- File Extensions Handling
- Backup and Unreferenced Files
- HTTP Methods
- File Permission

### Start the labs

```bash
$ cd OTG-Lab
$ cd "02. Configuration and Deploy Management Testing"
$ cd docker
$ docker-compose up
```

### Stop the labs

```bash
$ cd OTG-Lab
$ cd "02. Configuration and Deploy Management Testing"
$ cd docker
$ docker-compose rm -f -s
```

