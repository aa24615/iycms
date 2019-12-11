echo "准备添加到本地库"
git status
git add .
echo "已添加到本地库"
git commit -m '123'
echo "正在推送到远程库"
git push origin master
echo "完毕"
