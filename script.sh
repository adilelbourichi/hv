for f in *; do
    if [ -d "$f" ] && [ $f != "archive" ] && [ $f != "oldFavorites" ]; then
        rm -Rf $f;
        php populate.php;
        php data.php;
        git checkout $f/;
        php bets.php $f;
        git checkout history.php;
        git checkout statistics.php;
    fi
done