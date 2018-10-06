# Material Bottle 
![主页](https://i.loli.net/2018/10/06/5bb8c8b9499b2.png)
## 什么是 Material Bottle？
Material Bottle 是 OBottle 的质感设计分支，OBottle 是一款极简轻量级的博客程序，采用 PHP 编写。而本项目，则是在原有的功能基础上，加入了 [Material Design](https://material.io) 的设计元素，运用的库框架为 [MDUI](https://github.com/zdhxiong/mdui)。
## 如何使用 Material Bottle？
![编写](https://i.loli.net/2018/10/06/5bb8c8ba220ca.png)
使用 Material Bottle 的方式很简单，仅需将 Github 上的内容全部打包解压到网站的根目录，访问 `/admin/` 目录进行设置后，即可开始发布您的文章。
需要注意的是，Material Bottle **并不使用数据库存储数据**，而是将数据以 PHP 文件的形式存储在 `/p/` 目录。也正因此，您在备份的时候仅需备份 `/p/` 目录即可。
## Material Bottle 的优势
**更加轻量**。这要归功于 OBottle 的开发宗旨。它并不需要数据库，也不需要繁杂的安装程序，仅需创建一个管理员账户，即可开始自己的创作。
**自由度高**。`conf.php` 在此分支版本中将会发挥更大的作用，在以后的更新中，可配置的内容将会变得更全面。此外，如果对这方面很熟悉的用户，可以通过修改文件的方式达到自己想要的结果，且中间没有任何第三方力量阻挡。
**Markdown 写作**。OBottle 采用 PHP-Markdown 解析器解析 Markdown，使您的书写更加便捷，也能够更加方便地定义自己文章的格式。
## 我想了解更多？
Material Bottle 会开设专门的 Wiki，内部介绍 Material Bottle 的所有文件的结构和作用，以及其他的开发措施。
当然，我们也有面向一般用户的操作手册，您随时都可以来阅读。