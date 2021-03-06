<?php
/**
 * User: yongli
 * Date: 17/9/6
 * Time: 22:51
 * Email: yong.li@szypwl.com
 * Copyright: 深圳优品未来科技有限公司
 */

namespace App\Core;
    
/****************** 系统相关配置 *******************/

// 解析配置文件
$config = parse_ini_file(ROOT_PATH . 'config.ini', true);

// 设置时区
date_default_timezone_set($config['system']['date_default_timezone_set']);

// YP_DEBUG true为开启Debug模式
define('YP_DEBUG', $config['system']['debug']);

// 结束正在运行的多个进程时,间隔时间,单位秒
define('KILL_INSTANCE_TIME_INTERVAL', $config['system']['stop_multi_instance_time_interval']);

// 是否立即刷送输出.调用方若没有ob_系列函数则不需要修改此值
define('IMPLICIT_FLUSH', $config['system']['implicit_flush']);

// Log路径
define('LOG_PATH', $config['file']['log_filename_prefix'] . date('Y-m-d') . '.log');

// 标准输出路径
define('STDOUT_PATH', $config['file']['stdout_path_prefix'] . date('Y-m-d') . '.stdout');

// Pid文件路径
define('MASTER_PID_PATH', $config['file']['master_pid_path']);

// 统计信息存储文件路径
define('STATISTICS_PATH', $config['file']['statistics_path']);

/******************** TCP相关配置 **********************/

// TCP链接中默认最大的待发送缓冲区
define('TCP_CONNECT_SEND_MAX_BUFFER_SIZE', $config['connection']['tcp_send_max_buffer_size']);

// TCP链接中所能接收的最大的数据包
define('TCP_CONNECT_READ_MAX_PACKET_SIZE', $config['connection']['tcp_read_max_packet_size']);

/********************* 事件相关  *********************/

// SELECT事件轮询中的超时时间
define('EVENT_SELECT_POLL_TIMEOUT', $config['event']['event_select_poll_timeout']);

// SELECT轮询事件最大监听资源数.此为PHP源码限制.默认为1024. 框架最多接收1020. 如果要改变这个值,请重新编译PHP(--enable-fd-setsize=2048)
define('EVENT_SELECT_MAX_SIZE', $config['event']['event_select_max_size']);

/******************** HTTP相关 *********************/

// 域名和目录, 支持多组。 格式为: 域名1&路径1 | 域名2&路径2
// 每组中域名和路径用"&"分割, 多组间用"|"分割。 自动忽略空格换行。 域名必须包含端口, 80端口除外
define('HTTP_DOMAIN_DOCUMENT_LIST', $config['http']['http_domain_document_list']);

// 默认页, 多个用英文半角逗号分割。 自动忽略空格换行
define('HTTP_DEFAULT_PAGE', $config['http']['http_default_page']);

// Session name
define('HTTP_SESSION_NAME', $config['http']['http_session_name']);

// 上传文件时, 是否只获取文件的内容, 而不需要生成临时文件。true是生成临时文件,同Nginx/Apache一样。false是只获取文件的内容。
define('HTTP_UPLOAD_FILE_GENERATE_TEMP_FILE', $config['http']['http_upload_file_generate_temp_file']);

// 三层模型中, 内部链接的PING间隔
define('TRIDENT_SYS_PING_INTERVAL', $config['trident']['trident_sys_ping_interval']);

// 三层模型中, 内部链接的未收到PING的最大次数, 超出后断开连接
define('TRIDENT_SYS_PING_NO_RESPONSE_LIMIT', $config['trident']['trident_sys_ping_no_response_limit']);

// 三层模型中, 内部链接等待权限验证的超时时间
define('TRIDENT_SYS_WAIT_VERIFY_TIMEOUT', $config['trident']['trident_sys_wait_verify_timeout']);

// 三层模型中, Confluence定时给Business推送全量Transfer
define('TRIDENT_SYS_CONFLUENCE_BROADCAST_INTERVAL', $config['trident']['trident_sys_confluence_broadcast_interval']);