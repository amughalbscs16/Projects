import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;

public class WorkingClass
{
static ArrayList<Order> Orders = new ArrayList<>();
static ArrayList<Godown> Godowns = new ArrayList<>();

static String starter_order_file_lines="";
static Scanner input = null;    


public static ArrayList<Order> getOrders()
{
    return Orders;
}
public static ArrayList<Godown> getGodowns()
{
    return Godowns;
}

/*** Reads the Orders and Makes the Objects of 
 * the Orders and Adds it to the WorkingClass.Orders
 * i.e. an ArrayList Containing All the Orders;
 */
public static void readOrders(File Orders_File)
{
//OrderFile = String containing all the content of Orders File;
//Split_Orders Contain Each Order 
Orders.clear();
Godowns.clear();

String OrderFile=" "; String[] Split_Orders;   
ArrayList<ArrayList<String>> Orders_Info = new ArrayList<>();

try {
input = new Scanner(Orders_File);
}
catch (FileNotFoundException ex) {
    System.out.println("File not found");
}

/*Reading the First Three Lines of 
* Orders File to Write it in the 
* File While Updating the Orders File
*/

for (int i=0;i<3;i++) {    
starter_order_file_lines+=input.nextLine();
}

/*Storing the Data of Orders File into String OrderFile
*for splitting it in the next Steps
*/
while (input.hasNext()) {
OrderFile+=input.nextLine();
}

//Just Testing the Print *** To Remove ***
//System.out.println(OrderFile);

/*Each Split_Order Array Element to contain an Order*/
Split_Orders=OrderFile.split(":;");
//Convering String of Orders Into Array List of Orders;
for (int i=0;i<Split_Orders.length;i++) {
Orders_Info.add(new ArrayList<>(Arrays.asList(Split_Orders[i].split(";"))));

    //Passing Orders to Make Orders for Processing
   Orders.add(new Order(Orders_Info.get(i)));

System.out.println(Orders_Info.get(i).get(0));
}

}

 public static ArrayList<Godown> readGodown(File Godown_Func)
{
     String Godown_File=""; String[] Godown_Content;
     Scanner Godown_input = null;     
     try {
        Godown_input = new Scanner(Godown_Func);
        }
    catch (Exception e) {
        System.out.println("File not found");
    }
    
//Making Order String Appending All Lines Of File
while (Godown_input.hasNext()) {
Godown_File+=Godown_input.nextLine();
}

//Just Testing the Print *** To Remove ***
System.out.println(Godown_File);

//Splitting the Orders File Divind the different Orders.
Godown_Content=Godown_File.split(";");
//Making Objects of Godowns;
Godowns.add(new Godown(Godown_Content));

     return Godowns;
}


}
