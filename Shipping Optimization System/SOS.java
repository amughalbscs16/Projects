/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.net.MalformedURLException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Scanner;
import org.json.JSONException;

/**
 * @author ABN PC
 */
public class SOS {
/*The Starter Function is for Reading the Orders and Godown's Files*/
    public static void starter() throws IOException, MalformedURLException, JSONException {
        
    File Orders = new File("C:\\Users\\abuba\\workspace\\SOS\\src\\Orders.txt");
    File Godowns_List[] = new File[4];
    //Reading the Orders File and Making Orders Objects
    WorkingClass.readOrders(Orders);
    
    for (int i=1;i<4;i++) {
    Godowns_List[i]=new File("C:\\Users\\abuba\\workspace\\SOS\\src\\Godown"+(i)+".txt");
    //Reading the Godowns Files and Making Godown Objects.
    WorkingClass.readGodown(Godowns_List[i]);
    }
    /*Hard Coded Values Below For Just Printing Out for Demo 
     * How to Program is Working
     *Just for Printing the Available Godowns
     * Indexes to The Screen for Demo.
     */
    int[] Godowns_index = new int[4]; 
    for (int i=0;i<WorkingClass.Orders.size();i++)
    { 
     try{
     Godowns_index = WorkingClass.Orders.get(i).Available_Godown(WorkingClass.Godowns);
     System.out.println("Order "+(i+1)+" is sent = "+WorkingClass.Orders.get(i).getSent());
     }
     catch(IOException | JSONException ex)
     {
      System.out.println("Godowns Indexes Improper Return Exception");
     }
    
    for (int j=0;j<Godowns_index.length;j++)
        System.out.println((i+1)+" has Godowns "+Godowns_index[j]);
    }
    Writer.WriteOrders();
    Writer.WriteGodowns();
  }
    
}







