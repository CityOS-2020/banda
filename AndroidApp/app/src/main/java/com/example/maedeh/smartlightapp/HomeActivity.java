package com.example.maedeh.smartlightapp;

import android.app.Activity;
import android.os.Handler;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;

import com.jjoe64.graphview.GraphView;
import com.jjoe64.graphview.series.DataPoint;
import com.jjoe64.graphview.series.LineGraphSeries;

import org.apache.http.HttpResponse;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.Random;


public class HomeActivity extends Activity {

    private final Handler mHandler = new Handler();
    private Runnable mTimer1;
    private Runnable mTimer2;
    private LineGraphSeries<DataPoint> mSeries1;
    private LineGraphSeries<DataPoint> mSeries2;
    private double graph2LastXValue = 5d;


    GraphView graph;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        graph = (GraphView) findViewById(R.id.graph);

        mSeries1 = new LineGraphSeries<DataPoint>(generateData());
        graph.addSeries(mSeries1);



    }


public int nesto(){
    final int[] retval = new int[1];
    Thread thread = new Thread(new Runnable() {
        @Override
        public void run() {

            try {
                retval[0] = apidata();
            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }

        }
    });
    return retval[0];

}

    @Override
    public void onResume() {
        super.onResume();
        mTimer1 = new Runnable() {
            @Override
            public void run() {
                mSeries1.resetData(generateData());
                mHandler.postDelayed(this, 300);
            }
        };
        mHandler.postDelayed(mTimer1, 300);

    }

    @Override
    public void onPause() {
        mHandler.removeCallbacks(mTimer1);
        mHandler.removeCallbacks(mTimer2);
        super.onPause();
    }

    private DataPoint[] generateData() {
        int count = 30;
        DataPoint[] values = new DataPoint[count];
        for (int i=0; i<count; i++) {
            double x = i;
            double f = mRand.nextDouble()*0.15+0.3;
            double y = Math.sin(i*f+2) + mRand.nextDouble()*0.3 + nesto();
            DataPoint v = new DataPoint(x, y);
            values[i] = v;
            Log.v("poruka", String.valueOf(nesto()));
        }
        return values;
    }

    double mLastRandom = 2;
    Random mRand = new Random();
    private double getRandom() {
        return mLastRandom += mRand.nextDouble()*0.5 - 0.25;
    }

    int apidata() throws UnsupportedEncodingException {
        JSONObject jsonobj = new JSONObject();
        try {
            jsonobj.accumulate("username", "nn");
            jsonobj.accumulate("password", "gg" );
        } catch (JSONException e) {
            e.printStackTrace();
        }


        DefaultHttpClient httpclient = new DefaultHttpClient();
        HttpPost httppostreq = new HttpPost("http://192.168.1.147/App");

        StringEntity se = new StringEntity(jsonobj.toString());



        httppostreq.setEntity(se);


        httppostreq.setHeader("Accept", "application/json");
        httppostreq.setHeader("Content-type", "application/json");

        HttpResponse httpresponse = null;
        try {
            httpresponse = httpclient.execute(httppostreq);
        } catch (IOException e) {
            e.printStackTrace();
        }


        String responseText = null;
        try {
            responseText = EntityUtils.toString(httpresponse.getEntity());
        } catch (IOException e) {
            e.printStackTrace();
        }

        JSONObject json = null;
        try {
            json = new JSONObject(responseText);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        String logged;
        try {
            logged  = json.getString("data");
            Log.v("msg ", logged);
        } catch (JSONException e) {
            e.printStackTrace();
        }

        return 0;
    }

}
