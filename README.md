**基于yii2框架做的部分层级拆分**
   * controller
       * 单纯的作为参数的透传层，重新封装基类（后续加入一些鉴权，token等功能）
   
   * 将models层拆分为三层：service（业务层），bo（数据对象/处理层），dao（持久化层）
       * service：主要处理复杂业务逻辑，模块中的一个controller对应一个service下子目录，一个方法对应一个类，可以满足复杂业务逻辑的独立性和内聚性。
       * bo：主要负责获取数据，比如获取db数据，缓存数据，外部接口数据，处理包装数据，设计遵循方法的单一性原则。
       * dao：主要负责数据的持久化，对db的操作，里面不要有任何业务逻辑处理代码，仅仅只是增删改查操作，可以允许少许对数据进行格式化处理。
       
   * 配置类的重新封装
       * 不使用yii的envionment环境，目前分为dev，test，prod三个环境，三种环境各自独立，直接通过在当前运行php环境中的php.ini里面添加DEBUG和RUN_MODE，用这个来决定是否开启调试模式和决定使用哪种环境配置文件。
   
   * 异常处理类的重新封装
       * 主要针对业务逻辑中出现的异常收敛，统一管理异常码和异常信息。
   
   * 重新封装常量配置
       * 将分散在各自业务代码中的常量收敛到constant中，里面按业务块来定义常量类。
   
   * 新增sqlmap模块
       * 所有sql语句必须在sqlmap中定义，配合重新封装db中的command 处理来操作db，使用sqlmap的最大好处是方便sql的管理审核，减少复杂sql对应用性能的拖累。
       
   * 新增cache模块
       * 所有cache key语句必须在cache中定义，配合重新封装library中的Cache 处理来操作cache，使用sqlmap的最大好处是方便cache的key和time管理审核，减少key冲突和防止缓存穿透和雪崩。
        
   * 新增参数校验模块
       * 根据业务逻辑对一些输入业务数据进行一些校验，如必须，长度等，还可以传入匿名函数校验。
            
   * 新增library库
       * 主要是一些处理工具类组件
   
   * 改写response
       * 完全按照restAPI来设计，所有返回统一为json
       
   * 新增middleware层
       * 按模块分别进行配置需要的操作，如鉴权，筛选过滤，防攻击等中间件的按需加载    
       
       
   以上所有改动都不涉及yii2的核心类库改动，所以yii2原则上可以正常升级，
   除此之外yii2中所有核心组件也都能正常使用，建议在重新划定的层级中使用，
   以便业务的解耦和业务的内聚，后期会加入自定义日志和自动生成文档功能_
   
   * php.ini中配置参考
   * sld.RUN_MODE = dev/test/prod
   * sld.DEBUG = true
   * 分别对应开发，测试和线上环境，注意prod模式下debug为false

**基于yii2框架的项目笔记**
   * 打印原生SQL：echo $query->createCommand()->getRawSql();
   * migrate自动化建表 
       * ./yii migrate/create  update_admin  
       * 'content' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext')->comment('答题详情'),
