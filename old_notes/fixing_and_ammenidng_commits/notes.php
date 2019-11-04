<?php

/*
    fixing commit (ammend them)

    if I made a mistake and added / committed and pushed to production, I simply need to make
    a new commit (after having fixed the mistake)  


    if I made a mistake and did not push to production, I can use git reset --hard or --soft
        git reset --hard  +commit_id (resets the project to how it was at that specific commit
        so it removes any changes I made in the code)

    git reset --soft only resets the commit (but any changes that have been made since that
        specific commit will still remail)

    git commit --amend (ammends the previous commit)

    git inspect + commit id (shows the commit + the changes)

*/