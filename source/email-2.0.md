---
extends: _layouts.main
section: body
title: Email 2.0 - Improvements to the email spec to make more reliable and secure.
description: Improvements to the email spec to make more reliable and secure.
---
# Email 2.0

Hashing out my idea for email 2.0 - This should be written into a proper document

Example of sending mail
================

  * example.org mail server
    * Stores public key for bob@example.org

  * example.com mail server
    * Stores public key for alice@example.com


bob@example.org wants to send an email to alice@example.com

  * bob composes his message with his email client and presses send
  * bob's email client connects the mail server for example.com (by mx record lookup) and asks for the public key for alice@example.com
  * bob's email client encrypts the message with alice's public key - only From and To headers remain unencrypted, all other headers are encrypted
  * bob's email client signs the message with bob's private key.
  * bob's email client sends the message to the example.com mail server
  * example.com mail server connects to example.org mail server (by mx record lookup) and asks for the public key for bob@example.com
  * example.com mail server verifies the signiture with bob@example.com's public key
  * email is accepted if the signiture matches, and rejected if it does not


Details
================
Encryption is optional, since the part that matters the most in this is the signing to authenticate the email. Since you already have the method of retrieving public keys from mail servers and and all users must have private keys to sign the messages, it is easy enough just to encrypt the message as well.


Pros
=============
Spoofed mail is history.

  * All email that is sent must be signed with the users private key or it is not delivered.

Clients can send mail directly

  * Mail clients can do all of the connection to the remote server without having to relay through their own server.
  * It is still possible to have the server send, it would just need a copy of the public key, or the email should be pre-signed.

No more IP blacklisting

  * All mail can only be sent by being signed by a private key that can be verified as coming from that domain
  * Either the email address or domain can be blocked for spam instead

Cons
=============

Not backwards compatable

  * The requirment that all messages must be signed, makes it so all servers and clients must be updated
  * However, servers and clients can have a fallback
    * Clients with Email 2.0 connecting to an email server can test if it supports email 2.0
      * If it does not, the client should fallback to old methods.
    * Servers with Email 2.0 can optionally choose to support mail coming from current methods and treat it as it currently does.

Encryption
================

All encryption and signing is done with asymmetric keypairs. A standard will need to be decidied on of what method to use.
