

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

import static java.util.Collections.list;
import org.json.JSONException;
import org.json.JSONObject;

public class Item
{
    int Serial,Quantity=0; String Name;
    Item()
    {}
    Item(String[] Item)
    {
        Serial=Integer.parseInt(Item[0]); 
        Name=Item[1];
        Quantity=Integer.parseInt(Item[2]);
        System.out.println(this.toString());
    }
 
    @Override
    public String toString()
    {
        return  "Item: "+Name+" Quantity:"+ Quantity+"\t";
        
    }
    public void setserial(int serial)
    {
    	Serial=serial;
    }
    public void setname(String name)
    {
    	this.Name=name;
    }
    public void setquantity(int quantity)
    {
    	this.Quantity=quantity;
    }
    public String getname()
    {return Name;}
    public int getquantity()
    {return this.Quantity;}
    public int getserial()
    {return this.Serial;}
}


    




