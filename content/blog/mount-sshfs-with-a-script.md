---
layout: post
title: Mount sshfs with a script
h1: Mount sshfs with a script
date: 2011-08-09 16:24:02
categories: Linux
description: sshfs is great for mounting remote directories locally. If you want to mount a sshfs directory locally with a script, you need to be able to connect to it with a script.
---
sshfs is great for mounting remote directories locally. If you want to mount a sshfs directory locally with a script, you need to be able to connect to it with a script.

This script uses expect to allow you to mount any ssh location with username and password. Normally you need to setup public key authentication and just issue the sshfs command, but if you need to use a username and password, this will do the trick for you. Public key authentication is still supported and will just ignore your set password. It will even skip the first time verification for you in both cases.

* Note, skipping first time verification can be dangerous and could be a security risk, especially if this is run outside of a trusted environment. You may use this script at your own risk.

<pre><code language="bash">
#!/usr/bin/expect -d
set timeout -1
set username user
set password mypa55w0rd
set server example.com
set mountpoint /mnt/example

# connect to server
send_user "connecting to $server\n"
spawn -ignore HUP /usr/bin/sshfs -f $username@$server: $mountpoint
#login handles cases:
#   login with keys (no user/pass)
#   user/pass
#   login with keys (first time verification)
#   user/pass (first time verification)
expect {
	"assword: " {
		send "$password\n"
		expect {
			"\n" { }
		}
	}
	"(yes/no)? " {
		send "yes\n"
		expect {
			"assword: " {
				send "$password\n"
				expect {
					"\n" { }
				}
			}
			"\n" { }
		}
	}
	"\n" { }
	default {
		send_user "Login failed\n"
		exit
	}
}
</code></pre>
