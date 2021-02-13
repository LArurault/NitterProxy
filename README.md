# NitterProxy

## Description

As the name says, this code is a [Nitter](https://github.com/zedeus/nitter) proxy. I am using Nitter to follow Twitter accounts through RSS feeds, but for the moment in cannot setup my own instance, so I am using [public ones](https://github.com/zedeus/nitter/wiki/Instances). Sometimes, I encounter rate limited instances, and changing all my RSS url is a bit fastidious. So this code will automatically switch between instances and unified results (in particularly RSS items ID) to avoid duplication.

## Incoming features

- Dedicated file to store instances URLs,
- Random choice of the instance to dispatch calls,
- Save limited instance to exclude them from calls,
- Better code structure for reusability,
- ...

## Contributions

Feel free to contribute through PR :-)

## License
This code is under GNU GPL.
