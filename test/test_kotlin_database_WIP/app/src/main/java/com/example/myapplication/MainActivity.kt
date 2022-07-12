package com.example.myapplication

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.StrictMode
import android.util.Log
import java.sql.DriverManager
import java.sql.SQLException
import java.util.*

/*
add jdbc connector to file, project structure, add dependency

build.gradle(app), dependency
implementation("org.postgresql:postgresql:42.3.1")

add at the end of manifest
<uses-permission android:name="android.permission.INTERNET" />
 */

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        Log.i("test", "----------------------------------------------------------------------------------------test----------------------------------------------------------------------------------------")
        main()
    }
}

// data class User(val id: Int, val name: String)

fun main(){
    /*
    val mysql_url = "jdbc:mysql://localhost:3306/sql_base"
    // get the connection
    val connection = DriverManager
        .getConnection(mysql_url, "root", "root")
*/

    val connectionProps = Properties()
    connectionProps.put("user", "root")
    connectionProps.put("password", "root")
    val policy = StrictMode.ThreadPolicy.Builder().permitAll().build()
    StrictMode.setThreadPolicy(policy)
    try {
        Class.forName("com.mysql.cj.jdbc.Driver").newInstance()
        var conn = DriverManager.getConnection(
            "jdbc:" + "mysql" + "://" +
                    "localhost" +
                    ":" + "3306" + "/" +
                    "sql_base" +
                    "?useUnicode=true&characterEncoding=UTF-8&zeroDateTimeBehavior=CONVERT_TO_NULL&serverTimezone=GMT&enabledTLSProtocols=TLSv1.2",
            connectionProps
        )
        Log.i("test_conn", conn.toString())
    } catch (ex: SQLException) {
        // handle any errors
        ex.printStackTrace()
    } catch (ex: Exception) {
        // handle any errors
        ex.printStackTrace()
    }


}