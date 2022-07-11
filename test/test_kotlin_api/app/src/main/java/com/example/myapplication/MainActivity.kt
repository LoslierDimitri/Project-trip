package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import okhttp3.*
import java.io.IOException

/*
gradle script, build.gradle (.app), dependencies
implementation 'com.squareup.okhttp3:okhttp:3.10.0'

end of manifest.xml
<uses-permission android:name="android.permission.INTERNET" />

 */

//const val EXTRA_MESSAGE = "com.example.myfirstapp.MESSAGE"
var EXTRA_MESSAGE = "test de message dans EXTRA_MESSAGE"
var response_to_send = ""

class MainActivity : AppCompatActivity() {

    private val client = OkHttpClient()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
    }

    fun sendMessage(view: View) {

        api_call()

        Log.i("resp", response_to_send)
        val intent = Intent(this, DisplayMessageActivity::class.java).apply {
            putExtra(EXTRA_MESSAGE, response_to_send)
        }
        startActivity(intent)
    }

    fun assign_response_to_send(resp: String?) {
        if (resp != null) {
            response_to_send = resp
            Log.i("resp in asign", resp)
            Log.i("resp_to_send in asign", resp)
        }
    }

    fun api_call() {
        val request = Request.Builder()
            .url("https://community-open-weather-map.p.rapidapi.com/weather?q=London%2Cuk&lat=0&lon=0&callback=test&id=2172797&lang=null&units=imperial&mode=xml")
            .get()
            .addHeader("X-RapidAPI-Key", "dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a")
            .addHeader("X-RapidAPI-Host", "community-open-weather-map.p.rapidapi.com")
            .build()
        client.newCall(request).enqueue(object : Callback {
            override fun onFailure(call: Call, e: IOException) {}
            // override fun onResponse(call: Call, response: Response) = println(response.body()?.string())
            override fun onResponse(call: Call, response: Response) =
                assign_response_to_send(response.body()?.string())
        })
    }
}