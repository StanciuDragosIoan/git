<?php

/*
    git add = takes a 'snapshot' of the current setup
        until the commit the changes are not saved/tracked under version control
    git commit = saves changes


    if I add some file and then do changes to it and then run 'git status' I will see the commit
    I had made and the changes that have not been staged (the modifications I made after having
    added the file)

    if I run 'git diff index.txt' I will see the initial version of index.txt (Hello World) and 
    the modified one (Hello Wolrd2)
        * - with red means what you had before change
          + with green means what you just changed (what you have now)

    rm -rf .git (remove git with recursive force)

    git log shows all the commits/changes made to the file (so we can revert back to a certain
    point in time)

*/