<h1 align="center">
  <br>
  <a href="https://github.com/oszo/OTG-Lab">
    <img src="badge.png" alt="OTG-Lab"></a>
  <br>
</h1>
<h4 align="center">OTG-Lab - CTF Lab follow OWASP Testing Guide v4</h4>

## Introduction

`OTG-Lab` is a lab for beginners that need to practice to perform Web Application Penetration Testing with CTF style, follow [OTGv4](https://www.owasp.org/index.php/OWASP_Testing_Guide_v4_Table_of_Contents).

## Requirements

* Docker
* Docker Compose

## Quick start

### Start the lab

Almost all the labs can launch by docker compose. Just clone this git repository and cd into each folder and run `docker-compse up -d` such as follow:

```bash
$ git clone https://github.com/oszo/OTG-Lab.git
$ cd OTG-Lab
$ cd "02. Configuration and Deploy Management Testing" # Go to the lab directory you want to do.
$ cd docker
$ docker-compose up -d
```
### Stop the lab

After playing the labs.  cd into each folder and run `docker-compse rm -f -s`  to stop and clean all services, such as follow:

```bash
$ cd OTG-Lab
$ cd "02. Configuration and Deploy Management Testing" # Go to the lab directory you want to stop.
$ cd docker
$ docker-compose rm -f -s
```

## Start CTFd

CTFd is CTF platform for submit flags of each lab. User the following command for start the CTFd application:

```bash
$ cd OTG-Lab
$ cd "CTFd"
$ docker-compose up -d
```

The challenge order is in the `README.md` file in each lab directory. You can read the challenge order by click into each lab directory in this git repository.

## Todo

- [x] 1.  Information Gathering
- [X] 2.  Configuration and Deploy Management Testing
- [X] 3.  Identity Management Testing
- [X] 4.  Authentication Testing
- [X] 5.  Authorization Testing
- [X] 6.  Session Management Testing
- [X] 7.  Input Validation Testing
- [X] 8.  Error Handling
- [X] 9.  Cryptography
- [X] 10. Business Logic Testing
- [X] 11. Client Side Testing
- [ ] Update to WSTG 4.2

## Contribution

Your contributions and suggestions are welcome.

## License

[![Creative Commons License](http://i.creativecommons.org/l/by/4.0/88x31.png)](http://creativecommons.org/licenses/by/4.0/)

This work is licensed under a [Creative Commons Attribution 4.0 International License](http://creativecommons.org/licenses/by/4.0/)
