package com.sudosaints.vishleshan.model;

import java.io.Serializable;
import java.util.Date;
import java.util.Map;

/**
 * @author Vishal
 *
 */
public class Event implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private String event;
	private Date timeStamp;
	private Map<String, Object> extraData;
	
	public Event(String eventName) {
		this.event = eventName;
		this.timeStamp = new Date();
		this.extraData = null;
	}
	
	public Event(String event, Map<String, Object> extraData) {
		super();
		this.event = event;
		this.extraData = extraData;
		this.timeStamp = new Date();
	}

	public String getEvent() {
		return event;
	}
	
	public void setEvent(String event) {
		this.event = event;
	}
	
	public Date getTimeStamp() {
		return timeStamp;
	}
	
	public void setTimeStamp(Date timeStamp) {
		this.timeStamp = timeStamp;
	}
	
	public Map<String, Object> getExtraData() {
		return extraData;
	}
	
	public void setExtraData(Map<String, Object> extraData) {
		this.extraData = extraData;
	}
}
