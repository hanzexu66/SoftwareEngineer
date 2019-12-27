package cn.brainysoon.basefind.dao;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.datasource.DriverManagerDataSource;

import javax.sql.DataSource;

@Configuration
public class DataConfig {
    private static final String MYSQL_DRIVER_CLASS_NAME = "com.mysql.cj.jdbc.Driver";
    private static final String MYSQL_HOST = "cdb-ezjh4cma.bj.tencentcdb.com";
    private static final String MYSQL_URL = "jdbc:mysql://" + MYSQL_HOST + ":10210/Baike?useUnicode=true&characterEncoding=utf-8";
    private static final String MYSQL_USER_NAME = "root";
    private static final String MYSQL_USER_PASSWORD = "abcd1234";

    @Bean
    public JdbcTemplate jdbcTemplate(DataSource dataSource) {

        return new JdbcTemplate(dataSource);
    }

    @Bean
    public DataSource mysqlDataSource() {

        DriverManagerDataSource dataSource = new DriverManagerDataSource();

        dataSource.setDriverClassName(MYSQL_DRIVER_CLASS_NAME);
        dataSource.setUrl(MYSQL_URL);
        dataSource.setUsername(MYSQL_USER_NAME);
        dataSource.setPassword(MYSQL_USER_PASSWORD);

        return dataSource;
    }
}
