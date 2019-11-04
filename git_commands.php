<?php

    /*  
        commands###

        
        git config --global user.name = 'StanciuDragosIoan' (config user)

        git config --global user.email = 'stanciudragosioan92@gmail.com' (config e mail)

        git config --global cored.editor = 'vim' (choose editor)

        git config (shows configuration options for git)

        git init -initialize repo

        git add (file or . ) -adds a specific file/more files or all the files

        git commit -m  -commit to master branch

        git push -u origin master -push to master

        rm -rf .git (removes git directory with recusrive force)/resets git as if it had'nt been 
            there

        git status -shows the status of my changes

        git log -shows all the commits/changes made to the file (so we can revert back to a 
        certain point in time)

        git diff (file name) -shows unmodified file and modified

        git reset --hard  +commit_id (resets the project to how it was at that specific commit
        so it removes any changes I made in the code)

        git reset --soft only resets the commit (but any changes that have been made since that
        specific commit will still remail)

        git commit --amend (ammends the previous commit)

        git show + commit id (shows the commit + the changes)

        git diff (shows differences when modifying after adding but before commiting 
        changes)

         git checkout -- src/Controller/SampleController.php (undo the last changes in
         SampleController.php)

          git checkout -b feature-branch (create a new branch called feature-branch)

          git checkout branch-name (switches to the respective branch)

        when fixing some small issue (we can do it on the master branch)
        when fixing some more complex issue, we need a new branch (or when working on
        a completely new feature)


        Say we finished implementing the feature in the feature-branch

        now we want to merge it into the master branch

        first checkout into master git checkout master

        then run git merge feature-branch
        
        git branch -d feature-branch (delete a branch after merging it to master)
            make sure you are on master while deleting the development one

        
        git branch (shows all current branches)

        git branch -v (shows all current branches + last commit on each of them)

        git stash (stashes changes so we can switch branches and work on different things)
            next run git stash apply or git stash pop

            git stash list (shows the stashes) 

            git stash pop (apply the changes and pop them off the stash list)

            git stash apply(returns the files)

                if we have multiple stashes but want to apply only 1:
                        git stash stash@{0} (note the id)

                we can also run git stash drop (specify id or it will default to the latest
                stash)

            git log --oneline (shows all commits on 1 line)
             similar cmd : git log --oneline --graph
                    
                       and we can see the merge and the commits as a graph
                        the graph is read from bottom up (and we can see the commits
                        and the head branch is marked with *)



            git rebase master (to rebase changes from the
                dev branch to master - this will add the commits that are not already on
                the master branch to it)
            
             next run git merge <branch_name> to merge the changes afte rebase

            now if I run git log --oneline --graph (I can't see the graph structure from
            the branch anymore, and I can only see the commits history)

            git rebase -i master (from interactive)
                allows to modify commits/squash/remove them/etc.. before rebasing

            git reflog (shows logs)
        */


    /*
        tips


        -commit each time a new feature is added to the app

        -git commit (without -m) allows us to write longer commits


    */