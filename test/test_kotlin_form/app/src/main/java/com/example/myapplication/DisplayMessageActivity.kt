package com.example.myapplication

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView

class DisplayMessageActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_display_message)

        // Get the Intent that started this activity and extract the string
        val message = intent.getStringExtra(EXTRA_MESSAGE)

        val text_1 = ""
        val text_2 = ""
        val list = message?.split(" ")




        //val message = "test de texte 1"
        // Capture the layout's TextView and set the string as its text
        val textView = findViewById<TextView>(R.id.textView).apply {
            text = list!![0]
        }

        val message2 = "test de texte 2"
        val textView2 = findViewById<TextView>(R.id.textView2).apply {
            text = list!![1]
        }


    }
}