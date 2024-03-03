import './bootstrap';
import mqtt from "mqtt";
import Quill from 'quill';
import "quill/dist/quill.core.css";
const connection_options = {
    host: "wss://mr-connection-8kti4cbi2qy.messaging.solace.cloud:8443",
    username : 'solace-cloud-client',
    password : 'ej9d6bras6dpg8nm6soldbqjt4',
    clientId : 'mqttjs_' + parseInt(Math.random(100)*1000),
    protocolId: 'MQTT',
    protocolVersion: 4,
    clean: true,
    keepalive: 10,
    reconnectPeriod: 1000,
    connectTimeout: 10000,
    will: {
        topic: 'WillMsg',
        payload: 'Connection Closed abnormally..!',
        qos: 0,
        retain: false
    },
    rejectUnauthorized: false
}
const client = mqtt.connect(connection_options.host, connection_options);
client.on("connect", () => {
    console.log("connected to solace successfully with id " + connection_options.clientId);
})

window.client = client;

window.currentRoom = 0;
