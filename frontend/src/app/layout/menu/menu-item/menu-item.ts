export interface MenuItem {
  icon: string;
  label: string;
  link: string;
  subItems?: MenuSubItem[];
}

export interface MenuSubItem {
  label: string;
  link: string;
}
