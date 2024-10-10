for f in 2024*; do
    if [ -d "$f" ] && [ $f != "archive" ] && [ $f != "oldFavorites" ]; then
        rm -Rf $f;
        php populate.php;
        php favpopulate.php;
        git checkout $f/;
        php bets.php $f;
        git checkout history.php;
        git checkout favhistory.php;
    fi
done