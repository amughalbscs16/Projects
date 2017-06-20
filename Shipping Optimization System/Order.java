import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.PrintWriter;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

import org.json.JSONException;
import org.json.JSONObject;

//Sent=Delivery; Completed = Order Completition to be used for future display of orders;
//Godowns_index The Available Godown's Indexes.  Selected_Index Closest Godown Index from Godowns Index
//Distance from Godown = Distance from closest Godown.
public class Order{
String Client_Name, Destination, Contact_Information,Source;
int Order_Number; static int Number_Of_Orders=0;
Boolean Sent=false,Complete=false;
int[] Godowns_index; int Selected_Index;double Distance_from_Godown;
ArrayList<Item> Items = new ArrayList<>();
String LogFile="";
Order(ArrayList<String> Order)
{
    
   // ArrayList<ArrayList<String>> Orders_Split = new ArrayList<>();
    String[][] Orders_Split = new String[Order.size()][];
    for (int i=0;i<Order.size();i++)
    {
        Orders_Split[i]=Order.get(i).split(",");
        Orders_Split[0][0]=Orders_Split[0][0].replace(" ","");  //Removing Spaces
    }
    
    this.Order_Number=Integer.parseInt(Orders_Split[0][0]);
    this.setName(Orders_Split[0][1]);
    setContact(Orders_Split[0][2]);
    setDestination(Orders_Split[0][3]);
    this.Sent=Boolean.parseBoolean(Orders_Split[0][4]);
    this.Complete=Boolean.parseBoolean(Orders_Split[0][5]);
    this.Source=Orders_Split[0][6];
    this.Distance_from_Godown=Double.parseDouble(Orders_Split[0][7]);
    for (int i=1;i<Orders_Split.length;i++)
        Items.add(new Item(Orders_Split[i]));  //Adding Items to Order
   
}
public String toString()
{
    return this.Order_Number+","+this.Client_Name+","+this.Contact_Information;
}

public void setSent(Boolean Sent)
{
    this.Sent=Sent;
}
public void setComplete(Boolean Complete)
{
    if(Sent)
    this.Complete=Complete;
}
public Boolean getSent(){ 
    return Sent;
}
public Boolean getComplete(){ 
    return Complete;
}
public void setName(String Name)
{
    if(!Sent)
    this.Client_Name=Name;
}
public void setDestination(String Destination)
{
    if(!Sent)
    this.Destination=Destination;
}
public void setContact(String Contact)
{
    if(!Sent)
    this.Contact_Information=Contact;
}
public void setSource(String Source)
{
    if(!Sent)
    this.Source=Source;
}
public String getName()
{
    return Client_Name;
}
public String getDestination()
{
    return this.Destination;
}
public String getContact()
{
    return this.Contact_Information;
}
public String getSource()
{
    return this.Source;
}

//Gets the Indexes of Available Godowns.
public int[] Available_Godown(ArrayList<Godown> Godowns) throws IOException, MalformedURLException, JSONException
{
    
    ArrayList<Integer> Godowns_Index = new ArrayList<>(); ArrayList<Boolean> Checklist;
    Godowns_Index.clear();
try { for (int i=0;i<Godowns.size();i++)
{ 
    Checklist = new ArrayList<>();
    for (int j=0;j<this.Items.size();j++)
    {
        for (int k=0;k<Godowns.get(i).Items.size();k++){
            if (this.Items.get(j).Serial==Godowns.get(i).Items.get(k).Serial) 
            {
                if (this.Items.get(j).Quantity<=Godowns.get(i).Items.get(k).Quantity)
                {
                   Checklist.add(j,true);
                }
                else break; 
            }
          }
    }
        
        if (Checklist.size()==this.Items.size()){
        Godowns_Index.add(i);
        }
}
} //End Try Block
catch(Exception ex)    //If Some Item is not Available/Less In quantity Exception Occurs.
{
	ex.printStackTrace();
}  
//Converting the Array List<Integer> Into Integer Array;
    int[] indexes = new int[Godowns_Index.size()];
    for (int x=0;x<indexes.length;x++)
       indexes[x]=Godowns_Index.get(x);
    this.Godowns_index=indexes;
    this.PrepareOrder();
    
    return indexes;
}
//Get's The Closest Godown and Sets it to the Destination
public void PrepareOrder() throws MalformedURLException, IOException, JSONException
{
	if (!this.getSent())
    try{
        URL url;
        URLConnection con;
        InputStream in;
        this.Destination = this.Destination.replace(" ", "%20"); 
        double shortest; int short_index=0;     //Shortest = Distance; short_index=The Index of the Shortest Distant.
        double Godowns_Distance[] = new double[this.Godowns_index.length];   
        String url1; String temp_location;
        for (int i=0;i<Godowns_index.length;i++)
        {   
        temp_location = WorkingClass.Godowns.get(Godowns_index[i]).Location.replace(" ", "%20");System.out.println("PRepare Block");
            
        System.out.println("* Distance To *:"+Destination.replace("%20"," "));
        System.out.println("* From *:"+temp_location.replace("%20"," "));
        url1 = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins="+temp_location+"&destinations="+this.Destination+"&key=AIzaSyBqttkkPd6kQcuRrUdAYKcpjdPkLyMKaKY";        
        url = new URL(url1);
        con = url.openConnection();
        in= con.getInputStream();
        String encoding = con.getContentEncoding();  // ** WRONG: should use "con.getContentType()" instead but it returns something like "text/html; charset=UTF-8" so this value must be parsed to extract the actual encoding
        encoding = encoding == null ? "UTF-8" : encoding;
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        byte[] buf = new byte[8192];
        int len = 0;
        while ((len = in.read(buf)) != -1) {
        baos.write(buf, 0, len);
        }
        String body = new String(baos.toByteArray(), encoding);
        System.out.println(body);
        this.LogFile+=body;
        String Response=body;
        JSONObject jsonRespRouteDistance = new JSONObject(Response)
                                        .getJSONArray("rows")
                                        .getJSONObject(0)
                                        .getJSONArray ("elements")
                                        .getJSONObject(0)
                                        .getJSONObject("distance");

        String distance = jsonRespRouteDistance.get("text").toString();
        int distance_1 = Integer.parseInt(jsonRespRouteDistance.get("value").toString());   //Distance in Meters

        String destination_addr = new JSONObject(Response)
                            .get("rows")
                            .toString();

        System.out.println(distance+"les and meters "+ distance_1);
        Godowns_Distance[i]=distance_1/1000.0;  //Convertion to KM's
            }
            //Conversion into Double
             shortest=Godowns_Distance[0]+0.0;
             //Finding The Shortest Distant Godown
            for (int i=0;i<this.Godowns_index.length;i++)
            {
             if (Godowns_Distance[i]<shortest)
             {
                 shortest=Godowns_Distance[i]+0.0;
                 short_index=i;
             }
              }
            this.Selected_Index=short_index;
            this.Source=WorkingClass.Godowns.get(Selected_Index).Location;
            this.Distance_from_Godown=Godowns_Distance[short_index]; 
            //Adding Content to Log File
            this.LogFile+="Order = "+this.Order_Number+" *** The Selected Godown is *** = "+
                    (this.Selected_Index+1)+"\nLocation is \""+WorkingClass.Godowns.get(Selected_Index).Location+"\" The Distance from the Godown is = "+this.Distance_from_Godown;
            //Printing The Selected Godown
            System.out.println("Order = "+this.Order_Number+" *** The Selected Godown is *** = "+
                    (this.Selected_Index+1)+"\nLocation is \""+WorkingClass.Godowns.get(Selected_Index).Location+"\" The Distance from the Godown is = "+this.Distance_from_Godown);
           //If Not Processed/Sent Then Deduct from the Godowns the quantity.
            if(!this.getSent())
            for (int i=0;i<this.Items.size();i++)
            {
                for (int j=0;j<WorkingClass.Godowns.get(Selected_Index).Items.size();j++)
                if (WorkingClass.Godowns.get(Selected_Index).Items.get(j).Serial == this.Items.get(i).Serial)
                {	
                	this.LogFile+="\n* "+"Order Item Number: "+(i+1)+" *";
                	this.LogFile+="\n"+"Before Deduction = "+WorkingClass.Godowns.get(Selected_Index).Items.get(j).toString();
                	this.LogFile+="\n"+"To Be Deducted Quantity = "+this.Items.get(i).Quantity;
                	WorkingClass.Godowns.get(Selected_Index).Items.get(j).Quantity -= this.Items.get(i).Quantity;  
                	this.LogFile+="\n"+"After Deduction = "+WorkingClass.Godowns.get(Selected_Index).Items.get(j).toString();
                }
            }
            this.LogFile+="\nProcessing Data and Time: "+dateFormat.format(date)+"\n\n\n\n\n //";
            this.setSent(true);
            //Writing the Logs File of This Order
            PrintWriter writer = new PrintWriter("C:\\Users\\abuba\\workspace\\SOS\\src\\Logs\\"+this.Order_Number+".txt");
            writer.println(LogFile);
            writer.flush();
    		}
	catch(Exception ex)
	{
		System.out.println(ex.getStackTrace());
	}
   }
DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
Date date = new Date();

}