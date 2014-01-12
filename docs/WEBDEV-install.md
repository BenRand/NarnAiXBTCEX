# NarnAiXBTC Installation Procedure

This guide will assist you with installing NarnAiXBTC. This document assumes you are running Ubuntu 12.04 LTS, adjustments may need to be made for other OSes.

If you don't understand how to use this document, **NarnAiXBTC is not for you**. NarnAiXBTC requires a commanding understanding of UNIX system administration to be run safely. If you are learning, you can use NarnAiXBTC's `testnet` mode to ensure that mistakes cannot lead to loss of money.

## System Requirements

A Development environment of your choice.  We recommend VPS with at least 2GB RAM is needed for the moment. Baring in mind you will be having access to server and api access tokens.


##IF INSTALLING BITCOIND SERVER

## Install Prerequisites

Update your repository data and packages if this is a fresh install of Ubuntu:

```
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install git autoconf libtool ntp build-essential
```

It is recommended you enable [unattended security updates](https://help.ubuntu.com/community/AutomaticSecurityUpdates) to help protect your system from security issues:

```
sudo apt-get install unattended-upgrades
sudo dpkg-reconfigure -plow unattended-upgrades
```

## Install NodeJS

The latest information on installing NodeJS for your platform is [available here](https://github.com/joyent/node/wiki/Installing-Node.js-via-package-manager), this is the current procedure for Ubuntu:

```
sudo apt-get install python-software-properties python g++ make
sudo add-apt-repository ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install nodejs
```

## Install and Configure Bitcoind

Currently NarnAiXBTC depends on a custom build of Bitcoind using [this patch](https://github.com/bitcoin/bitcoin/pull/2861).

```
git init
git clone https://github.com/bitcoin/bitcoin.git
cd bitcoin
sudo add-apt-repository ppa:bitcoin/bitcoin
sudo apt-get update
sudo apt-get install libdb4.8++ libdb4.8++-dev pkg-config libprotobuf-dev libminiupnpc8 minissdpd libboost-all-dev ccache
./autogen.sh
./configure --without-qt
make
sudo make install
```

Now you need to configure bitcoind:

```
mkdir -p ~/.bitcoin
vi ~/.bitcoin/bitcoin.conf
```

And add the following information (set the `rpcuser` and `rpcpassword` to something else:

```
rpcuser=NEWUSERNAME
rpcpassword=NEWPASSWORD
txindex=1
testnet=1
```

**If your bitcoind crashes due to memory consumption**, try limiting your connections by adding `maxconnections=10`. Try further adjusting to 3 if you are still having issues.

If you want to run NarnAiXBTC in production rather than on testnet, remove `testnet=1` from the config. Testnet emulates the production Bitcoin network, but does so in a way that you can't lose money. You can send money to your NarnAiXBTC accounts using Bitcoin Testnet Faucets like [the Mojocoin Testnet3 Faucet](http://faucet.xeno-genesis.com/). I strongly recommend this mode for testing.

Start bitcoind:

```
bitcoind &
```

**Bitcoind will take several hours or more to download the blockchain.** NarnAiXBTC will not be able to function properly until this has occurred. Please be patient.

If you want something to monitor bitcoind to ensure it stays running and start it on system restart, take a look at [Monit](http://mmonit.com/monit/).

## Install and Configure NarnAiXBTC

Go to your user's home directory (`cd ~`), clone the repository and install nodejs dependencies:

```
git clone https://github.com/NarnAiX/NarnAiXBTC.git
cd NarnAiXBTC
npm install
```

Edit the file to connect to `bitcoind`. Use port `18332` for testnet, `8332` for production. Also remove the `testnet` entry for production:

```
{
  "bitcoind": "http://NEWUSERNAME:NEWPASSWORD@127.0.0.1:18332",
  "pricesUrl": "https://bitpay.com/api/rates",
  "testnet": true,
  "httpPort": 8080
}
```

For SSL:

```
{
  "bitcoind": "http://NEWUSERNAME:NEWPASSWORD@127.0.0.1:18332",
  "pricesUrl": "https://bitpay.com/api/rates",
  "testnet": true,
  "httpPort": 8085,
  "httpsPort": 8086,
  "sslKey": "./NarnAiXBTC.key",
  "sslCert": "./NarnAiXBTC.crt"
}
```

Now copy the client application's config:

And change `network` to `prod` instead of `testnet` if you are using NarnAiXBTC in production mode.

## Start NarnAiXBTC

You can start NarnAiXBTC from the command line:

```
node start.js
```


Try to connect by going to http://YOURADDRESS.COM:8080  (If you're using the SSL config then try  http://YOURADDRESS.COM:8085. OR https://YOURADDRESS.COM:8086) If it loads, then you should be ready to use NarnAiXBTC!

## Backing up Database

Redis maintains a file called `/var/lib/redis/dump.rdb`, which is a backup of your Redis database. It is safe to copy this file while Redis is running. **It is strongly recommended that you backup this file frequently.** You can also setup a Redis slave to listen to master in real time. Ideally you should do both!

## INSTALLING WEB SYSTEM
