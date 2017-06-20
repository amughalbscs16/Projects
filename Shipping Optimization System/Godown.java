import java.util.ArrayList;

public class Godown
{   int Number;
String Location;
ArrayList<Item> Items = new ArrayList<>();
Godown(){}
String[][] Godown_Items;
Godown(String[] Godown_Item){
Godown_Items = new String[Godown_Item.length][];
for (int i=0;i<Godown_Item.length;i++){

Godown_Items[i]=Godown_Item[i].split(",");
}
this.Number = Integer.parseUnsignedInt(Godown_Items[0][0]);
this.Location = Godown_Items[0][1];
for (int j=1;j<Godown_Item.length;j++)
Items.add(new Item(this.Godown_Items[j]));
}

public Item getitem(int id)
{
	return Items.get(id);
}


@Override
public String toString()
{
    System.out.println("LOCATION" + Location);
    return Location;
}


}