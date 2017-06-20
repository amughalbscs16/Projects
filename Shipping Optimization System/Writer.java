import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Scanner;
import java.io.*;
public class Writer {
	//Writing the Orders Files After Deleting IT.
	 public static void WriteOrders() throws IOException

	 {
	     boolean write_verify=true;
	     try{
	    PrintWriter writer = new PrintWriter("C:\\Users\\abuba\\workspace\\SOS\\src\\Orders.txt", "UTF-8");
	    writer.println("Order No, Name, Phone, Destination,Sent,Completed;");
	    writer.println("Serial1,Object,Quantity;");
	    writer.println("Serial2,Object,Quantity:;");
	    for (int i=0;i<WorkingClass.Orders.size();i++)
	    {
	        writer.print(WorkingClass.Orders.get(i).Order_Number+","+WorkingClass.Orders.get(i).Client_Name+",");
	        writer.print(WorkingClass.Orders.get(i).Contact_Information+","+WorkingClass.Orders.get(i).Destination.replace("%20", " ")+",");
	        writer.print(WorkingClass.Orders.get(i).getSent()+","+WorkingClass.Orders.get(i).getComplete()+","+WorkingClass.Orders.get(i).Source+","+WorkingClass.Orders.get(i).Distance_from_Godown+";");
	       writer.println("");
	        for (int j=0;j<WorkingClass.Orders.get(i).Items.size();j++)
	        {
	            writer.print(WorkingClass.Orders.get(i).Items.get(j).Serial+","+WorkingClass.Orders.get(i).Items.get(j).Name+","+WorkingClass.Orders.get(i).Items.get(j).Quantity);
	            if (j==WorkingClass.Orders.get(i).Items.size()-1)
	                writer.print(":;");
	            else 
	            writer.print(";");
	            writer.println();
	        }
	        writer.println();
	    }
	    writer.close();
	} catch (IOException e) {
	   System.out.println("The Order File Could'nt Be Written");
	}
	     catch (Exception ex)
	     {
	    	 System.out.println("The Order File Couldn't be Written");
	     }
	     
	   
	 }
	//Writing the Orders Files After Deleting IT.
		 public static void WriteGodowns() throws IOException

		 {
		     boolean godown_writer=true;
		     PrintWriter writer=null;
		     
		     try{
		    	 for (int i=1;i<WorkingClass.Godowns.size()+1;i++){
		    		 
		    writer = new PrintWriter("C:\\Users\\abuba\\workspace\\SOS\\src\\Godown"+i+".txt");
		    
		    writer.println(i+","+WorkingClass.Godowns.get(i-1).Location+","+"Quantity;");
		     for (int j=0;j<WorkingClass.Godowns.get(i-1).Items.size();j++)
		        {
		            writer.println(WorkingClass.Godowns.get(i-1).Items.get(j).Serial+","+WorkingClass.Godowns.get(i-1).Items.get(j).Name+","+WorkingClass.Godowns.get(i-1).Items.get(j).Quantity+";");
		           
		        }
		        writer.println();
		        writer.flush();
		    	 }
		        
		    	 
		    	 
		} catch (IOException e) {
		    godown_writer=false;
		   System.out.println("The Godowns File Could'nt Be Written");
		}catch (Exception ex)
		     {
			ex.printStackTrace();
		     }
		     
		     
		 }
}
