<p align="center"><b> UltraPush </b>: 一个 Kindle 期刊推送网站</p>

<p align="center">简单设置，稳定地推送精选新闻到你的 Kindle</p>

## 目的

现有的 Kindle RSS 推送服务一大堆，但大多要么付费、要么不稳定、要么无人维护、要么限制诸多。

UltraPush 的目的很简单，就是一个优先保证**稳定性**的 Kindle RSS 推送网站。

## 进度

- [x] 基本的框架
- [ ] RSS 读取
- [ ] SMTP 邮件发送
- [ ] 生成期刊格式的 Kindle 电子书
- [ ] 推送逻辑

以上功能将优先完成.

- [ ] 全文采集（针对只提供了摘要的 RSS）
- [ ] 图片处理
- [ ] 缓存
- [ ] 不同邮箱推送不同内容
- [ ] 投递测试文档

## 原理

在用户设置的推送时间执行：

1. RSS 获取内容清单。将昨日推送时间到今日的推送时间的所有内容列出清单。对比缓存，找出不在缓存中的文章（一个项目可能被两个用户订阅。在他们的推送时间之差内的是新内容）
2. 采集获取全文
3. 采集图片，并进行处理（如灰度、长图裁剪等等）
4. 保存在缓存中。
5. 取出缓存中在推送时间范围内的文章。套入 HTML 模版并加入 CSS。
6. 推送

## 环境需要

 - PHP >= 7.1 (包含 OpenSSL,PDO,Mbstring,Tokenizer,XML,Fileinfo,cURL,SMTP 扩展)
 - MySQL >= 5.6
 - Redis（可选，用于缓存加速）
 - Nodejs（可选，用于前端资源编译）

## 部署

修改 `.env` 文件。

```
# 设置权限
$ chmod -R 755 *
$ chmod -R 777 storage

# 安装依赖
$ composer install --no-dev
# 若没有 Nodejs 可跳过下步
$ npm install

# 安装数据库
$ php artisan admin:install

# 编译前端资源 (若没有 Nodejs 可跳过)
$ npm run prod

# 生成 Key
$ php artisan key:generate

# 应用优化
$ php artisan clear-compiled
$ php artisan cache:clear
$ php artisan config:cache
$ php artisan optimize
$ composer dump-autoload --optimize
```

设置 Cron 以支持 Laravel 的任务调度系统。

`* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1`

*修改`path-to-your-project`为你自己的目录*

配置 Nginx 或 Apache 监听 public 目录即可。

*若使用 Nginx 还需要设置伪静态。下面是供参考的配置*

```
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## Contributing

十分希望你的 Contributing！请直接发 Pr。

## License

使用 [MIT license](https://opensource.org/licenses/MIT).
