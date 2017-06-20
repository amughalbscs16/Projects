/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


import com.teamdev.jxbrowser.chromium.Browser;
import com.teamdev.jxbrowser.chromium.swing.BrowserView;
import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.*;
import java.awt.event.*;
import java.beans.PropertyChangeEvent;
import java.beans.PropertyChangeListener;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.net.MalformedURLException;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.*;
import javax.swing.border.Border;
import javax.swing.event.ListSelectionEvent;
import org.json.JSONException;

/**
 *
 * @author ABN PC
 */
public class SOMAGUI {
   
     public void SettingUpMainPanel ()
     {
        
             SettingUpPanel1();
             SettingUpPanel2();
             Mainpanel.add(Panel1).setBackground(Color.blue);
             Mainpanel.add(Panel2).setBackground(Color.green);
             Button1.addActionListener(new ActionListener(){
                 @Override
                 public void actionPerformed(ActionEvent e)  {
                     try {
                    	 Writer.WriteOrders();
                    	 Writer.WriteGodowns();
                    	 try{
                             SOS.starter();
                             }catch (Exception ex)
                             {
                             	ex.printStackTrace();
                             }
                    	
                        setModel();
                         
                     } catch (IOException ex) {
                         Logger.getLogger(SOMAGUI.class.getName()).log(Level.SEVERE, null, ex);
                     }
                 }
             });
    }
     
   
    public void SettingUpPanel1()
    {
             Button1.setPreferredSize(new Dimension(600,30));
             List.setPreferredSize(new Dimension(600,250));
             JFrame.setDefaultLookAndFeelDecorated(true);
             Complete.setPreferredSize(new Dimension(300,35));
             Search.setPreferredSize(new Dimension(400,35));
             Search_Button.setPreferredSize(new Dimension(150,35));
             SearchLabel.setPreferredSize(new Dimension(50,35));
             showLogs.setPreferredSize(new Dimension(150,35));
             Panel1.setLayout(new FlowLayout());
             Panel1.add(Button1);
             Panel1.add(SearchLabel);
             Panel1.add(Search);
             Panel1.add(Search_Button);
             Panel1.add(List);
             scroll.setPreferredSize(new Dimension(600,250));
             Panel1.add(scroll);
             Panel1.add(Complete);
             Panel1.add(showLogs);
    }
    public void SettingUpPanel2()
    {
        setModel();
        DisplayTheMap();
    }
    int order_shown; //To Complete the Order we need to have a common attribute from both search and list
    public void GUI_Starter() {
    	Search_Button.addActionListener(new ActionListener()
    	{
    		int order_id;
			@Override
			public void actionPerformed(ActionEvent arg0) {
			try{
				order_id = Integer.parseInt(Search.getText().replace(" ", "").split(",")[0]);
				order_shown=order_id-1;
				LoadOrderDetails(order_id-1);
			
			if (WorkingClass.Orders.get(order_shown).getComplete()){
    			Complete.setEnabled(false);
    		}
			else Complete.setEnabled(true);
			}catch(Exception ex)
			{
				JOptionPane.showMessageDialog(null, "Enter a Valid Number");
				Search.setText("");
			}
			Search.setText(" ");
			}}); //Search Button
    		
    	    Complete.addActionListener(new ActionListener(){
    	    
    		public void actionPerformed(ActionEvent arg0)
    		{
    		 WorkingClass.Orders.get(order_shown).Complete=true;
    		 setModel();
    		}
    	});
    	
    	//Before Closing Some Checks and Asks for User to Close or not.
             try{
             SettingUpMainPanel();
             Frame.addWindowListener(new java.awt.event.WindowAdapter() {
             @Override
             public void windowClosing(java.awt.event.WindowEvent windowEvent) {
        	 if (JOptionPane.showConfirmDialog(Frame, 
             "Are you sure to close this window?", "Really Closing?", 
             JOptionPane.YES_NO_OPTION,
             JOptionPane.QUESTION_MESSAGE) == JOptionPane.YES_OPTION){
        		 boolean written=true;
        		 /* If An Error Occurs The Program Will not Close On One Try
        		  * You will have to keep trying until the files get saved
        		  */
             try {
				Writer.WriteOrders();
				Writer.WriteGodowns();
				written=true;
			} catch (IOException e) {
				e.printStackTrace();
				written=false;
			}
             catch  (Exception ex)
             {
            	written=false; 
             }
             //IF Exception Occur the Program Won't Close
             if (written)
             System.exit(0);
             else JOptionPane.showMessageDialog(null, "The Files are Not Saved Try Again");
            
        }
        
    }
    
});
             Frame.add(Mainpanel);
             Frame.setMinimumSize(new Dimension(1000,700) );
             Frame.setSize(new Dimension(1300,700));
             Frame.setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
             Frame.setBackground(Color.blue);
             Frame.setVisible(true); 
             }
             catch(Exception ex)
             {
             }
    }
    public void setModel()
    {
        try{
        	Model.removeAllElements();
        	}
        catch (Exception ex)
        {
        	
        }
        for (int i=0;i<WorkingClass.getOrders().size();i++){
        	/*If The Order is Not 
        	 * Completed Add it in the List
        	 * */
        	if (!WorkingClass.getOrders().get(i).getComplete())
        Model.addElement(WorkingClass.getOrders().get(i).toString());}
        List.setModel(Model);
        Actions();
    }
    Scanner logs;
    
    public void Actions()
    {
    	showLogs.addActionListener(new ActionListener(){
    		public void actionPerformed(ActionEvent e){
    			try {
					logs = new Scanner(new File("C:\\Users\\abuba\\workspace\\SOS\\src\\Logs\\"+(order_shown+1)+".txt"));
				} catch (FileNotFoundException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
    	JFrame frame  = new JFrame();
    	frame.setSize(600, 700);
    	JTextArea logsarea = new JTextArea();
    	JScrollPane scroll = new JScrollPane (logsarea, 
    		    JScrollPane.VERTICAL_SCROLLBAR_ALWAYS, JScrollPane.HORIZONTAL_SCROLLBAR_ALWAYS);
    	frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    	
    	scroll.setPreferredSize(new Dimension(frame.getWidth(),frame.getHeight()));
    	String logs_file="";
    	
    	while (logs.hasNext())
    	logs_file+=logs.nextLine()+"\n";
    	
    	JPanel panel = new JPanel();
    	panel.setPreferredSize(new Dimension(frame.getWidth(),frame.getHeight()));
    	
    	//Window State Listener To Cater The Size of Panel When The Size of Frame Changes
    	frame.addWindowStateListener(new WindowStateListener(){

			@Override
			public void windowStateChanged(WindowEvent arg0) {
				scroll.setPreferredSize(new Dimension(frame.getWidth(),frame.getHeight()));
				panel.setPreferredSize(new Dimension(frame.getWidth(),frame.getHeight()));
				
			}});
    	 logsarea.setForeground(Color.blue);
         logsarea.setText(logs_file);
         logsarea.setFont(new Font(textArea.getText(),Font.BOLD+Font.ITALIC,15));
         logsarea.setEditable(false);
         logsarea.setToolTipText("Displaying the Selected Order Logs");
         logsarea.setBackground(Color.black);
    	panel.add(scroll);
    	frame.add(panel);
    	frame.setVisible(true);
    		}});
    	
    	//Start of List Event Listener
        List.addListSelectionListener((ListSelectionEvent event) -> {
            if (!event.getValueIsAdjusting())
            {
                try{String[] IndexValue;
                String ali=List.getSelectedValue().toString();
                IndexValue = ali.split(",");
                index=Integer.parseInt(IndexValue[0])-1;
                System.out.println(index);
                order_shown=index;
                /*Loads the New URL by using the Destination
                * and Source of the New Order Selected
                */
                LoadOrderDetails(index);}
                catch(Exception ex)
                {
                	
                }
                
            }    
        });
		
        //Ending of the List Selection Listener
    }
    public void DisplayTheMap()
    {
        
            browser.loadURL("https://www.google.com/maps/dir/");
            Panel2.setSize(700, 700);
            Panel2.add(browserView);
            Mainpanel.add(Panel2);
            
    }
    public void Refresh() throws IOException, MalformedURLException, JSONException
    {
        SOS.starter();
        this.setModel();
    }
    public void LoadOrderDetails(int index)
    {
    	browser.loadURL("https://www.google.com/maps/dir/"+WorkingClass.getOrders().get(index).Source+"/"+
                WorkingClass.getOrders().get(index).Destination);
         
         String t="\t*** Order Information  ***\n";
         t+="Order No: "+WorkingClass.Orders.get(index).Order_Number+"\nName: "+WorkingClass.Orders.get(index).Client_Name; 
         t+="\nDestination: "+WorkingClass.Orders.get(index).Destination.replace("%20"," ");
         t+="\nGodown (Selected): "+WorkingClass.Orders.get(index).Source+"\nDistance :"+
                 WorkingClass.Orders.get(index).Distance_from_Godown;
         t+="\n*** Items in the Order ***\n";
         for (int i=0;i<WorkingClass.Orders.get(index).Items.size();i++)
         {
          t+=WorkingClass.Orders.get(index).Items.get(i).toString()+"\n";
         }
         t+="Sent = "+((WorkingClass.Orders.get(index).getSent())?"Yes\n":"No\n");
         t+="Completed = "+((WorkingClass.Orders.get(index).getComplete())?"Yes\n":"No\n");
         t+="Order Shown = "+(order_shown+1);
         textArea.setForeground(Color.black);
         textArea.setText(t);
         textArea.setFont(new Font(textArea.getText(),Font.BOLD+Font.ITALIC,15));
         textArea.setEditable(false);
         textArea.setToolTipText("Displaying the Selected Order Information");
         textArea.setBackground(Color.blue);
    }
    final Browser browser = new Browser();
    BrowserView browserView = new BrowserView(browser);
    JFrame Frame = new JFrame(); 
    JTextArea textArea = new JTextArea ("Select Order to Get Information");
    JScrollPane scroll = new JScrollPane (textArea, 
    JScrollPane.VERTICAL_SCROLLBAR_AS_NEEDED, JScrollPane.HORIZONTAL_SCROLLBAR_AS_NEEDED);
    JPanel Mainpanel = new JPanel(new GridLayout(0,2));
    JButton Button1 = new JButton("Refresh");
    JPanel Panel1 = new JPanel(new FlowLayout());
    JPanel Panel2 = new JPanel(new GridLayout(1,0));
    JList List = new JList();
    DefaultListModel<String> Model = new DefaultListModel<>();
    int index=0;
    JLabel SearchLabel=new JLabel("Order ID:");
    JButton Search_Button = new JButton("Search");
    JTextField Search = new JTextField("1");
    JButton Complete = new JButton("Complete");
    JButton showLogs = new JButton("Show Logs");
}
