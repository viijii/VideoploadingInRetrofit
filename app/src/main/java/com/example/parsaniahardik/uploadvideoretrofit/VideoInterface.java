package com.example.parsaniahardik.uploadvideoretrofit;

import okhttp3.MultipartBody;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.http.Multipart;
import retrofit2.http.POST;
import retrofit2.http.Part;

public interface VideoInterface {

    String VIDEOURL = "http://115.98.3.215:90/sRamapptest/";
    @Multipart
    @POST(".php")
    Call<String> uploadImage(
            @Part MultipartBody.Part file,
            @Part("filename") RequestBody name);

}
