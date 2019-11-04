<?php
    /*

    1. Say Hi to Git

        installed and configured git
            ran 
                git config --global user.name 'StanciuDragosIoan'
                git config --global user.email 'stanciudragosioan92@gmail.com'
        
        Version control works like snapshots (similarly to how we'd copy an entire 
        project fpr backup, playing around with the original and if we break something, 
        use the backup copy to revert back)

        created a txt file echo 'Hello World' > index.txt

        ran git init (initialized repo)

            run ls -la (to see the .git file)

        ran git add index.txt (added index file to version control)
            this makes the snapshot (doesn't save)

        git commit -m 'first commit'
            this actually saves a backup copy of the document




    2. What git actually does

        ran rm -rf .git (removed git)

        git init intiializez repo

        git add file (or .) adds 1 or more files to the staging area
            this takes the snapshot but does not save it to version control

        git commit saves the snapshot

            if we modify after adding, we need to add again to the staging area

        git diff (shows the differences when we commit after adding)

        ran git add index.txt again (to add the new changes)

        ran git commit (created a 2nd commit)

        now I can revert back to the first commit if needed


    
    3. Fixing and ammending commits

        if I make a mistake in a commit and I have pushed to production (github),
        I need to 'correct' that by making a new commit

        if I made a mistake in commit but I have not pushed to production (so it is
        only in my local project I can use git reset)

            git reset --hard (reset everything to the way the code look at a specific 
                        commit -> d4325d9b8cb0ba5af07e8ca6268ff64be185430a)

            git reset --soft only resets the commit (but any changes that have been made 
            since that specific commit will still remail)

        ran git reset --hard d4325d9b8cb0ba5af07e8ca6268ff64be185430a 

        I can also fix a mistake in a commit by simply modifying that specific commit
            first fix the mitake
            run git add .
            run git commit --amend -m 'changed typo' 

        ran git show d86899065446c465bf3569892f40ad5002d6af9a (to see the correct change
        in the file)


    4. Basic workflow

        created a new symfony app   

        cd-ed inside and initalized git

        note app comes with an initial commit and a git repo initialized

            we should commit when we reach a milestone (we have implemented a 
            feature, etc..)

            we should not commit config changes required only for local development

            when commiting if we want to commit a larger msg, just type 
                git commit (editor will open, type 1st line most descriptive for
                commit and then the long message after that on a different line)


        5. Branching

            we use branching when working on a different feature (say we develop a new
            feature or improve upon an existing one)

            however, as we do not want to affect production (and we need a 'fresh' branch
            for production so that if quick fixes are required, we can implement them
            fast) we will create a second branch (a development branch)

            this way we can work on the feature and still keep production stable

            removed .git in symfony app and re-initialized it
            added everything and committed

            made 1 more change and made a mistake
            added and commited

            made 1 more change  (no more mistake)
            when having to fix the previous mistake, we need a branch

            ran  git checkout -- src/Controller/SampleController.php (to undo the last
            change in the SampleController.php file)

            ran  git checkout -b feature-branch to create a new branch

            we can move between branches with git checkout branch-name 
             while on a branch we can add/commit changes
             if we run git log (we will see the commits for the respective branch)

            after merging the branch into master we delete the development one by
            running: git branch -d feature-branch

            basic branching workflow:
                git checkout -b 'fixing bug branch'
                fix the bug...

                git add . 
                git commit -m 'fixed bug'
                git checkout master
                git merge fixing bug branch
                git -d fixing bug branch

            *conflicts can occur when I modify a file X in development branch but the file
            has been modified differently in the master branch
                *conflicts need to be resolved


        6. Handling Merge Conflicts

            in empty symfony app:
                initialized git
                added everything
                commited

            ran git checkout -b feature/some-feature

            made changes

            added and commited


            ran git checkout master

            made a change to the same piece of code in the same file (but modified it
            differently)

            run git branch (to see all current branches)

            ran git branch -v (to see all branches + latest commit on each of them)

            when trying to run: git merge feature/some-feature
                we get 'automatic merge failed' as we need to fix the conflicts

            ##How to fix conflict

                run git status
                    this will show where the conflict is:   
                            both modified:   src/Controller/SampleController.php
                            
                ran git diff src/Controller/SampleController.php (to see the difference)

                ran  code  src/Controller/SampleController.php (this opens the file
                and shows where the conflict lies as well as the 2 versions of the same
                piece of code on the 2 branches Master and feature)

                changed the lines in the file (deleted both and kept only the 1 from master
                as I want the master change to prevail)

                    !note that after saving if I run git status, I can still see:
                            	both modified:   src/Controller/SampleController.php

                    however, if I now add and commit the changes, I can perform the 
                    merge

                    git add src/Controller/SampleController.php

                    git commit 

                    save and close (ctr+x)  
                        the conflict will be resolved and the merge performed

        
        
        7. Git Aliases

            in order to create an alias we can use 2 ways:

                we can update the global config file:   
                    say we want an alias for git status
                
                run git config --global alias.s status
                    now instead of git status we can type git s

                ran git config --global alias.l log
                    now instead of git log we can type git l

                git config --global --unset alias.l (unset the alias for log so now
                git l won't work anymore)

                !note aliases are stored in ~/.gitconfig (a .gitconfig file in the home 
                directory)


                we can also add aliases in ~/.bashrc (I could not get a git alias to work
                by placing it in there..)



        8. Stash away changes

            created a new branch in the symfony app and made a change

            typically I'd have to commit changes on development branch (feature-branch
            in this case), change to master branch and fix there whatever broke down

                        if I git checkout master (without commiting the changes in the
                        development branch...)

                        I can just create a commit on the dev branch
                        then I go to master and fix
                        when coming back to dev branch, I can just re-set everything to
                        that temporary commit - I reset --hard so that I can resume work
                        and commit onto the same commit so it won't create a new one

                            !do this only when working locally

                        I can also do git reset --soft (this will reset to the respective commit
                        but will keep the changes made afterwards and not yet added/commited)

                Instead of doing the commit and the reset, I can just run:
                     


            git stash (stashes changes so we can switch branches and work on different 
            things)
             next run git stash apply or git stash pop

            git stash list (shows the stashes) 

            git stash pop (apply the changes and pop them off the stash list)

            git stash apply(returns the files)

                if we have multiple stashes but want to apply only 1:
                        git stash stash@{0} (note the id)

                we can also run git stash drop (specify id or it will default to the latest
                stash)


            we can also have the following workflow:
                    stash changes in dev branch
                    checkout to master
                    delete dev branch
                    and when run git stash list (we can still see the stashed changes
                    and we can apply them to a different branch -master in this case)

                    run git stash pop (and changes from stash will be transfered onto
                    the master branch)

                    run git stash (stashed changes onto master branch)

                    run git stash branch dev-branch (this will create a new branch
                    and apply the stashed changes to it)

       
        9. Pushing to github

            once a project has been pushed to github, we need to pay attention to 3
            key areas in the github interface:
                    issues
                    pull requests
                    commits
            made 1 more change
            added/commited
            ran only git push (it will apply the -u origin master as the 'stream' to
            push has already been defined initially)
            
            made 1 more change
                    note in the github interface when looking at a commit we can see with
                    red the lines that have been changed and with green how they have
                    been changed (the changes)

            created an issue in github (from the interface)

            removed the app from local machine

            cloned from remote repo


        10. Rebasing

                instead of merging a branch we can use git rebase
                    git rebase <branch>

                created new repo

                created 1 file added and commited

                ran git log --oneline (shows all commits on 1 line)

                    similar cmd : git log --oneline --graph

                created alias for graph cmd:
                        alias l="git log --oneline --graph"
                
                created a new branch dev-branch

                switched to master and created a new file
                added/commited

                switched back to dev-branch created a new file
                added/commited

                created a 2nd new file in dev-branch

                switched to master branch 

                performed a merge

                    run the l command (alias for git log --oneline --graph)
                    and we can see the merge and the commits as a graph
                        the graph is read from bottom up (and we can see the commits
                        and the head branch is marked with *)


                will perform a rebase ()

                ran git reset --hard (to the commit to which I want to reset the project)

                    now I have the master clean and the dev-branch as it was (with the 2
                    features)
                
                while on the dev-branch run git rebase master (to rebase changes from the
                dev branch to master - this will add the commits that are not already on
                the master branch to it)

                next run git merge <branch_name> to merge the changes afte rebase

                now if I run git log --oneline --graph (I can't see the graph structure 
                from the branch anymore, and I can only see the commits history)


        
        
        11. Interactive Rebasing
            
            created an empty directory
            initialzied git
            created 2 php classes (and misspelled the name of 1)

            added and commited

            fixed typo in the misspelled class name
            added and commited


            further edited the person class (added a method and a property)
            added and commited

            further edited Job.php 

            added and commited


            will perform an interactive rebase onto the master branch (although we 
            commited onl onto the master branch)

            ran git checkout -b dev-branch
            
            ran git checkout master (moved bk to master)


            will do a git reset --hard to the first commit (do this only if code has 
            not been pushed onto remote repo)

            moved back to dev-branch

                ran git rebase -i master (from interactive)

                    modified the commit I want to modify and kept the rest and saved

                    we can also use git rebase -i master to squash commits (merge 1 commit
                    into the previous one)

                say I want to unwind that and get back all the squashed commits
                    run git reflog (shows logs)
                        copy the corresponding hash and run git reset --hard hash
    */

?>