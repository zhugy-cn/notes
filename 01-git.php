<?php

安装地址：https://git-scm.com/download

msysgit是Windows版的Git:  下载地址：https://git-for-windows.github.io

图形工具：https://www.sourcetreeapp.com/    sourcetree
    
    git 的初始
    1. git config --global user.name "zhuGuangYong"                  # 用户名
        
    2. git config --global user.email "860185538@qq.com"           # 邮箱

    3. ls ~/.ssh/id_rsa.pub                            # 检测是否存在 key,弹出路径
    
    4. ssh-keygen -t rsa -C "860185538@qq.com"         # 生成秘钥，连续3个回车,id_rsa是私钥，不能泄露出去，id_rsa.pub是公钥，可以放心地告诉任何人，

    5. cat ~/.ssh/id_rsa.pub                           # 查看公钥，将公钥复制添加到项目

    6. ssh -T git@git.oschina.net         # 弹出Welcome to Gitee.com, 朱光勇!表示成功



    二。将云端的仓库克隆到本地：git clone <版本库的网址> <本地目录名>

    1. git clone git@gitee.com:zhugy-cn/projectFolder.git test         # 把地址上的远程仓库克隆到test文件夹里面，文件夹没有会新建

    2. git add -A 

    3. git commit -m'描述'

    4. git push                            # 克隆的时候master分支默认存在追踪关系，不需要设置 -u 参数
    
    5. git push -u origin develop          # 其他分支第一次提交是需要用到 -u 参数，表示本地develop分支与远程develop分支建立追踪关系,






    git --version       2.7.2.windows.1

    C:/Users/Administrator/.gitconfig       # 全局配置文件
    
    当前仓库/.git/config                     # 本地配置文件

    git help status                         # 获取网页帮助

    git init test                           # 创建一个新的带Git仓库的test文件夹

    git init                                # 在已有的文件夹生成一个git仓库

    git status -s                           # 以更简单的形式输出文件变化

    git diff                                # 查看工作区与暂存区的变化

    git log                                 # 查看历史记录

    git branch -vv                          # 查看分支跟踪情况

    git config --global alias.st status     # 为git命令设置别名



一。第一次将本地的文件夹推送到云端，云端已经建好仓库，关联远程库

    1. git init                       # 初始化当前文件夹，会自动添加一个 .git 的文件，就是本地仓库，

    2. git add -A                     # 将所有文件提交到暂存区

    3. git commit -m '描述内容'        # 提交到本地仓库

    4. git remote add origin git@gitee.com:zhugy-cn/toolUse.git        # 将本地仓库连接到远程仓库地址，给远程仓库起了个别名，叫origin

    5. git pull origin master --allow-unrelated-histories

    6. git push --set-upstream origin master

    git push -u origin master                                       # 将本地文件推送到云端，如果报rejected错误，要先pull一下再push，（在第一次推送master分支时，加上了-u参数，Git不但会把本地的master分支内容推送的远程新的master分支，还会把本地的master分支和远程的master分支关联起来，在以后的推送或者拉取时就可以简化命令）

    git push origin master                                          # 将本地的master分支推送到远程的master分支

    git push --set-upstream origin master

    如果第5步git pull报错（fatal: refusing to merge unrelated histories）换成这段代码:【git pull origin master --allow-unrelated-histories】
    因为他们是两个不同的项目，要把两个不同的项目合并，git需要添加一句代码，在git pull，这句代码是在git 2.9.2版本发生的，最新的版本需要添加--allow-unrelated-histories
    假如我们的源是origin，分支是master，那么我们 需要这样写git pull origin master --allow-unrelated-histories需要知道，我们的源可以是本地的路径



三。分支操作

    git branch                      # 查看本地分支

    git branch -r                   # 查看本地与远程分支

    git branch develop              # 创建本地分支develop

    git checkout develop            # 切换到develop分支，在切换分支之前要确保工作区是干净的

    git checkout -b develop         # 创建并切换到develop分支

    git merge develop               # 把develop分支合并到当前分支，快速合并模式，看不出曾经做过合并，删除分支后，会丢掉分支信息，

    git push                        # 合并后需要 push 

    git merge --on-ff -m"合并的描述信息" develop           # 普通合并模式，–no-ff参数表示禁用快速合并！Git就会在merge时生成一个新的commit，这样，从分支历史上就可以看出分支信息,

    git rebase                      # 想合并到哪个分支的分支名，另一种合并

    git branch -d develop           # 删除分支，分支上有未提交更改是不能删除的

    git branch -D develop           # 强行删除分支，尽管这个分支上有未提交的更改

    git stash                       # 保存当前的改动,切换分支时使用

    git stash apply                 #　恢复切换分支前保存改动

    git branch -m develop test                             # 分支重命名,将develop分支改名为test分支

    git checkout -b 本地分支 远程分支                       # 拉取远程分支并切换

    git push --set-upstream origin develop                 # 建立本地当前分支与远程develop分支的链接（建立链接后可直接使用git push）

    git fetch origin 远程分支:本地分支                      # 会在本地新建分支，但不会自动切换，还需checkout

    git push origin :远程分支                               # 删除指定的远程分支，因为这等同于推送一个空的本地分支到远程分支，等同于 git push origin --delete master
    

    git pull <远程主机名> <远程分支名>:<本地分支名>

    1) git pull origin develop:master       # 取回origin主机的develop分支，与本地的master分支合并,本地没有分支会被新建
    
    2) git pull origin develop              # 取回origin/develop分支，再与当前分支合并。
    
    3) git pull origin                      # 本地的当前分支自动与对应的origin主机"追踪分支"（remote-tracking branch）进行合并。
    
    4) git pull                             # 上面命令表示，当前分支自动与唯一一个追踪分支进行合并
        

    git push <远程主机名> <本地分支名>:<远程分支名>

    1)  git push origin master:develop       # 即是将本地的master分支推送到远程主机origin上的develop分支，远程分支没有会被新建
    
    2)  git push origin master               # 如果远程分支被省略，则表示将本地分支推送到与之存在追踪关系的远程分支（通常两者同名），如果该远程分支不存在，则会被新建

    3)  git push origin                      # 如果当前分支与远程分支存在追踪关系，则本地分支和远程分支都可以省略，将当前分支推送到origin主机的对应分支

    4)  git push                             # 如果当前分支只有一个远程分支，那么主机名都可以省略，形如 git push，可以使用git branch -r ，查看远程的分支名


    git remote                      # 查看远程仓库状况

    touch .gitignore                # 创建过滤文件夹（mkdir）

    git config --list               # 查看全局设置

    git checkout --index.html       # 撤销单个文件更改

    git checkout .                  # 撤销所有

    git reset HEAD index.html       # 把暂存区的修改撤销掉，重新放回工作区

    git reset --hard HEAD^          # 回退版本，上一个版本就是HEAD^，上上一个版本就是HEAD^^，当然往上10个版本可以写成HEAD~100。

    git rm index.html               # 删除文件（已添加的要删除两次）

    git log                         # 查看历史版本，后面加上 --pretty=oneline  参数，表示只查询最近的一次版本

    git reset --hard dd67fd(版本号)                          # 回退到当前分支（因为Git在内部有个指向当前版本的HEAD指针，当你回退版本的时候，Git仅仅是改变HEAD指针的指向

    git branch --set-upstream master origin/next            # 手动建立追踪关系(tracking),指定master分支追踪origin/next分支,在git clone的时候，所有本地分支默认与远程主机的同名分支，建立追踪关系，也就是说，本地的master分支自动"追踪"origin/master分支。

    git reflog                                      # 用来记录你的每一次命令，可以用来回退版本

    git config --global credential.helper store     # 每次都要输入密码

    git remote -v                                   # 可以参看远程主机的网址。



    Git支持多种协议，包括https，但通过ssh支持的原生git协议速度最快


        touch .gitignore                # 创建过滤文件夹（mkdir）

        /target/                            过滤文件设置，表示过滤这个文件夹

        *.mdb,*.ldb,*.sln                   表示过滤某种类型的文件

        /mtk/do.c,/mtk/if.h                 表示指定过滤某个文件下具体文件

        !*.c , !/dir/subdir/                !开头表示不过滤

        *.[oa]    支持通配符：过滤repo中所有以.o或者.a为扩展名的文件,该方法保证任何人都提交不了这类文件


    ========出错 ：========================================
        $ git push
        To https://gitee.com/remilia/OUJIA.git
         ! [rejected]        server -> server (non-fast-forward)
        error: failed to push some refs to 'https://gitee.com/remilia/OUJIA.git'
        hint: Updates were rejected because the tip of your current branch is behind
        hint: its remote counterpart. Integrate the remote changes (e.g.
        hint: 'git pull ...') before pushing again.
        hint: See the 'Note about fast-forwards' in 'git push --help' for details.
        
        git fetch origin                先拉取下来
        git merge origin/master         合并，有冲突就要先解决冲突
        git push origin master          冲突解决后在push
        
        
        



    