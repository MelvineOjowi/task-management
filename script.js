const form = document.getElementById('task-form');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  const taskName = document.getElementById('task-name').value;
  const taskDuration = document.getElementById('task-duration').value;
  const taskSite = document.getElementById('task-site').value;
  const department = document.getElementById('department').value;
  const supervisor = document.getElementById('supervisor').value;
  const taskProgress = document.getElementById('task-progress').value;
  const taskStatus = document.getElementById('task-status').value;
  const dueByTime = document.getElementById('due-by-time').value;
  const urgency = document.getElementById('urgency').value;
  const checkbox = document.getElementById('checkbox').checked})


  // Get the task status value
  const taskStatus = taskStatusSelect.value;

  // Check if the task status is in progress or pending
  if (taskStatus === 'In Progress' || taskStatus === 'Pending') {
    // Create a reminder message
    const reminderMessage = 'Reminder: You have work not done!';
    reminderMessageElement.textContent = reminderMessage;
    form.appendChild(reminderMessageElement);
  } else {
    // Remove the reminder message if it exists
    if (reminderMessageElement.parentNode) {
      reminderMessageElement.parentNode.removeChild(reminderMessageElement);
    }
  }
