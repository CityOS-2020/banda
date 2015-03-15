package com.example.maedeh.smartlightapp;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.UnsupportedEncodingException;


public class MainActivity extends Activity {
    private EditText mUsernameView;
    private EditText mPasswordView;
    private String mUsername;
    private String mPassword;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        final Intent intent;
        intent = new Intent(this, MenuActivity.class);
        Button btn = (Button)findViewById(R.id.btnLogin);



        mUsernameView=(EditText) findViewById(R.id.editText);
        mPasswordView=(EditText) findViewById(R.id.editText3);


        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Thread thread = new Thread(new Runnable() {
                    @Override
                    public void run() {
                        //try {
                            mUsername=mUsernameView.getText().toString().trim();
                            mPassword=mPasswordView.getText().toString().trim();
/*
                            JSONObject jsonobj = new JSONObject();
                            jsonobj.accumulate("username", mUsername);
                            jsonobj.accumulate("password",mPassword );

                            DefaultHttpClient httpclient = new DefaultHttpClient();
                            HttpPost httppostreq = new HttpPost("http://192.168.1.147/login");

                            StringEntity se = new StringEntity(jsonobj.toString());



                            httppostreq.setEntity(se);


                            httppostreq.setHeader("Accept", "application/json");
                            httppostreq.setHeader("Content-type", "application/json");

                            HttpResponse httpresponse = httpclient.execute(httppostreq);


                            String responseText = null;
                            responseText = EntityUtils.toString(httpresponse.getEntity());

                            JSONObject json = new JSONObject(responseText);

                            String logged = json.getString("logged");
                            //if (logged == "true"){
  */                              startActivity(intent);
                            //}
                          //  Log.v("msg", responseText);
                        /*} catch (JSONException e) {
                            e.printStackTrace();
                        } catch (UnsupportedEncodingException e) {
                            e.printStackTrace();
                        } catch (ClientProtocolException e) {
                            e.printStackTrace();
                        } catch (IOException e) {
                            e.printStackTrace();
                        }*/

                    }
                });
                thread.start();

            }
        });
    }
}
