### IPS-Websocket-Application
Invision Power Board Application that connects to a Game-Server using WebSocket and sends a message upon a purchase.
Customizable options up to 4 products.
Option to customize your own commands by providing $command and $arguments.


Features:  
[ x ] Custom commands on console.  
[ x ] Custom commands in Game-Chat.  
[ x ] SteamID integration.  
[ x ] Product Selection.  
[ - ] Multiple Servers. ( comming soon) 

---

Examples:  

In-Game chat :
```
$commmand : say
$arguments : Testing
$steamID = false

Result:
Testing
```

Console
```
$commmand : O.usergorup add
$arguments : group
$steamID = true

Result:
Will add the user that bought a specific product to the VIP group.
```
<img src="https://i.imgur.com/xXoamOX.png" alt="IPS app">

Tested with Rust  
Requires:  
[ x ] https://invisioncommunity.com/files/file/8170-steam-profile-integration/  
[ x ] IPS Nexus (Commerce app)  

