:

export TZ=GMT
ts=`date +%s`
date=`date "+%Y-%m-%d %H:%M:00"`
version=`cat version.txt`

[ -f manifest.php ] || exit

file=`pwd`
file=`basename $file`-$version.zip

echo $file $ts $date

sed -i "s/published_date' => .*$/published_date' => '$date',/" manifest.php
sed -i "s/Marnus'/Marnus van Niekerk'/" manifest.php
sed -i "s/version' => .*$/version' => '$version',/" manifest.php

fgrep \'version manifest.php | cut -f2 -d\>

rm -f /tmp/$file
zip -r /tmp/$file * >/dev/null 2>&1
